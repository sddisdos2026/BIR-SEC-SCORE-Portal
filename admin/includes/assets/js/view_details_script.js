// Global variable to track the active category tab in the summary sidebar
let currentSummaryTab = 'ALL';

// Track category inside the main search filter modal
let currentCategory = 'ALL'; 

// 1. Initialise Layout Setup on Document Load
document.addEventListener('DOMContentLoaded', () => {
    // A. Setup category tab click listeners
    const tabs = document.querySelectorAll('#fileCategoryTabs .nav-link');
    tabs.forEach(tab => {
        tab.addEventListener('click', function() {
            tabs.forEach(t => t.classList.remove('active'));
            this.classList.add('active');

            currentSummaryTab = this.getAttribute('data-category');
            updateSummaryOnly();
        });
    });

    // B. Real-time updates: listen for checkbox changes inside the modal
    document.querySelectorAll('#combinedModal .file-checkbox').forEach(checkbox => {
        checkbox.addEventListener('change', () => {
            // Instantly updates the side pane list as user checks/unchecks options
            updateSummaryOnly(); 
        });
    });

    // C. Initial execution to show pre-checked values on page load
    updateSummaryOnly();
});

// 2. Main Modal Filter System
function filterFiles(category) {
    currentCategory = category;
    
    // Update Layout Elements
    document.getElementById('modalTitle').innerText = category;
    document.getElementById('fileSearchInput').value = ""; 
    document.getElementById('fileYearPicker').value = ""; // Reset dropdown selection
    
    // Reset Live Canvas Frame view state
    document.getElementById('modalPreviewFrame').src = 'about:blank';
    document.getElementById('modalPlaceholder').classList.remove('d-none');

    // Run unified conditional calculation
    applyFilters();
}


function applyFilters() {
    const searchTerm = document.getElementById('fileSearchInput').value.toLowerCase();
    const selectedYear = document.getElementById('fileYearPicker').value;
    const rows = document.querySelectorAll('.file-row');

    rows.forEach(row => {
        const filename = row.querySelector('.filename-text').textContent.toLowerCase();
        const rowCategory = row.getAttribute('data-category');

        // Evaluators
        const matchesCategory = (rowCategory === currentCategory);
        const matchesSearch = filename.includes(searchTerm);
        const matchesYear = (selectedYear === "") || filename.includes(selectedYear);

        // Combined logic gate requirement
        if (matchesCategory && matchesSearch && matchesYear) {
            row.style.setProperty('display', 'block', 'important');
        } else {
            row.style.setProperty('display', 'none', 'important');
        }
    });
}

// Attach the search function to the input event
document.getElementById('fileSearchInput').addEventListener('input', applyFilters);

function updatePreview(path) {
    const frame = document.getElementById('modalPreviewFrame');
    const placeholder = document.getElementById('modalPlaceholder');
    frame.src = path;
    placeholder.classList.add('d-none');
}

// 3. Save Selections and Sync Forms (Closes Modal)
function saveSelection() {
    const checkedBoxes = document.querySelectorAll('.file-row .file-checkbox:checked');
    const formDataContainer = document.getElementById('permanentlyStoredFilesContainer');
    
    if (formDataContainer) {
        formDataContainer.innerHTML = '';
        
        // Build the dynamic hidden form post inputs 
        checkedBoxes.forEach(box => {
            const fileId = box.getAttribute('data-id');
            const filePath = box.value;
            const filename = box.getAttribute('data-filename');
            const category = box.getAttribute('data-category');
            
            const template = `
                <input type="hidden" name="selected_items[${fileId}][id]" value="${fileId}">
                <input type="hidden" name="selected_items[${fileId}][path]" value="${filePath}">
                <input type="hidden" name="selected_items[${fileId}][name]" value="${filename}">
                <input type="hidden" name="selected_items[${fileId}][type]" value="${category}">
            `;
            formDataContainer.insertAdjacentHTML('beforeend', template);
        });
    }

    // Refresh the visual sidebar list
    updateSummaryOnly();
    
    // Close the bootstrap modal safely
    const modalElement = document.getElementById('combinedModal');
    if (modalElement) {
        const modalInstance = bootstrap.Modal.getInstance(modalElement);
        if (modalInstance) modalInstance.hide();
    }
}

// 4. Sidebar Summary Removals (Does NOT Close Modal)
function removeFromFileSummary(checkboxId) {
    const checkbox = document.getElementById(checkboxId);
    if (checkbox) {
        checkbox.checked = false;
        
        // Remove the hidden input from the background form container to keep things synced
        const fileId = checkbox.getAttribute('data-id');
        const hiddenInput = document.querySelector(`input[name="selected_items[${fileId}][id]"]`);
        if (hiddenInput) {
            const parent = hiddenInput.parentElement;
            const relatedInputs = parent.querySelectorAll(`input[name^="selected_items[${fileId}]"]`);
            relatedInputs.forEach(input => input.remove());
        }

        // Refresh the visual side list immediately
        updateSummaryOnly(); 
    }
}

// Legacy helper support
function removeSelectedFile(checkboxId) {
    removeFromFileSummary(checkboxId);
}

// 5. Dynamic Summary Layout Generator with Tab Filtering
function updateSummaryOnly() {
    const listContainer = document.getElementById('selectedFilesList');
    const placeholder = document.getElementById('selectionPlaceholder');
    const countBadge = document.getElementById('selectedCount');
    
    // Select all checked boxes across all categories inside the modal file grid
    const checkedFiles = document.querySelectorAll('.file-checkbox:checked');
    
    if (!listContainer) return;
    listContainer.innerHTML = '';
    
    // Set total files counted badge
    if (countBadge) {
        countBadge.innerText = checkedFiles.length;
    }

    if (checkedFiles.length === 0) {
        if (placeholder) placeholder.classList.remove('d-none');
        return;
    }

    const groupedFiles = {};
    let totalVisibleItems = 0;

    // Filter items based on the active category tab
    checkedFiles.forEach(cb => {
        const row = cb.closest('.file-row');
        
        // Fallback info recovery if check-box sits outside a standard wrapper row
        const fileName = row ? row.querySelector('.filename-text')?.innerText : cb.getAttribute('data-filename');
        const fileType = row ? row.getAttribute('data-category') : cb.getAttribute('data-category');
        
        if (!fileType) return;

        // Tab Filtering logic rule
        if (currentSummaryTab !== 'ALL' && fileType !== currentSummaryTab) {
            return; 
        }

        if (!groupedFiles[fileType]) groupedFiles[fileType] = [];
        groupedFiles[fileType].push({ id: cb.id, name: fileName || 'Unnamed File' });
        totalVisibleItems++;
    });

    // Handle empty views for filtered categories
    if (totalVisibleItems === 0) {
        if (placeholder) placeholder.classList.remove('d-none');
        return;
    }

    if (placeholder) placeholder.classList.add('d-none');

    // Render grouped categories and files into HTML layout
    for (const [categoryName, files] of Object.entries(groupedFiles)) {
        const categoryHeader = document.createElement('div');
        categoryHeader.className = 'bg-light px-3 py-2 border-bottom border-top text-uppercase fw-bold text-muted text-xxs';
        categoryHeader.innerText = categoryName;
        listContainer.appendChild(categoryHeader);

        files.forEach(file => {
            const item = document.createElement('div');
            item.className = 'list-group-item d-flex justify-content-between align-items-center bg-white border-bottom py-2 ps-4';
            item.innerHTML = `
                <div class="d-flex align-items-center">
                    <div class="icon icon-shape icon-sm bg-gradient-success shadow text-center border-radius-md me-3 d-flex align-items-center justify-content-center" style="width: 24px; height: 24px;">
                        <i class="fa fa-check text-white" style="font-size: 10px;"></i>
                    </div>
                    <span class="text-sm font-weight-bold text-dark">${file.name}</span>
                </div>
                <button type="button" class="btn btn-link text-danger p-0 mb-0 me-2" onclick="removeFromFileSummary('${file.id}')">
                    <i class="fa fa-times" style="font-size: 1rem;"></i>
                </button>
            `;
            listContainer.appendChild(item);
        });
    }
}

// 6. Form Submission Code
function submitApprovalWithModalData() {
    const targetForm = document.getElementById('approvalForm');
    if (!targetForm) {
        alert('Form validation failure: id="approvalForm" missing on layout.');
        return;
    }

    const oldInputs = targetForm.querySelectorAll('.js-dynamic-modal-input');
    oldInputs.forEach(el => el.remove());

    const passwordField = document.getElementById('modalPasswordInput');
    if (passwordField) {
        const passwordHiddenInput = document.createElement('input');
        passwordHiddenInput.type = 'hidden';
        passwordHiddenInput.className = 'js-dynamic-modal-input';
        passwordHiddenInput.name = 'password';
        passwordHiddenInput.value = passwordField.value;
        targetForm.appendChild(passwordHiddenInput);
    }

    const actionTriggerInput = document.createElement('input');
    actionTriggerInput.type = 'hidden';
    actionTriggerInput.className = 'js-dynamic-modal-input';
    actionTriggerInput.name = 'Approve';
    actionTriggerInput.value = '1';
    targetForm.appendChild(actionTriggerInput);

    targetForm.submit();
    
}
