
function ShowHideDiv() {
    var purposeOfRequest = document.getElementById("purposeOfRequest");
    var porA = document.getElementById("porA");
    var porB = document.getElementById("porB");
    porA.style.display = purposeOfRequest.value == "A" ? "block" : "none";
    porB.style.display = purposeOfRequest.value == "B" ? "block" : "none";
}

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.6.347/pdf.min.js"></script>
    // <link href="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.6.347/pdf_viewer.min.css" rel="stylesheet" type="text/css" />
        var pdfjsLib = window['pdfjs-dist/build/pdf'];
        pdfjsLib.GlobalWorkerOptions.workerSrc = 'https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.6.347/pdf.worker.min.js';
        var pdfDoc = null;
        var scale = 1; //Set Scale for zooming PDF.
        var resolution = 2; //Set Resolution to Adjust PDF clarity.

        function LoadPdfFromUrl(url) {
            //Read PDF from URL.
            pdfjsLib.getDocument(url).promise.then(function (pdfDoc_) {
                pdfDoc = pdfDoc_;

                //Reference the Container DIV.
                var pdf_container = document.getElementById("pdf_container");
                pdf_container.style.display = "block";

                //Loop and render all pages.
                for (var i = 1; i <= pdfDoc.numPages; i++) {
                    RenderPage(pdf_container, i);
                }
            });
        };
        function RenderPage(pdf_container, num) {
            pdfDoc.getPage(num).then(function (page) {
                //Create Canvas element and append to the Container DIV.
                var canvas = document.createElement('canvas');
                canvas.id = 'pdf-' + num;
                ctx = canvas.getContext('2d');
                pdf_container.appendChild(canvas);

                //Create and add empty DIV to add SPACE between pages.
                var spacer = document.createElement("div");
                spacer.style.height = "20px";
                pdf_container.appendChild(spacer);

                //Set the Canvas dimensions using ViewPort and Scale.
                var viewport = page.getViewport({ scale: scale });
                canvas.height = resolution * viewport.height;
                canvas.width = resolution * viewport.width;

                //Render the PDF page.
                var renderContext = {
                    canvasContext: ctx,
                    viewport: viewport,
                    transform: [resolution, 0, 0, resolution, 0, 0]
                };

                page.render(renderContext);
            });
        };

Base64
var img2data = (function() {
  'use strict';
  return {
    // this.qS(foo)
    qS: function(el) {
      return document.querySelector(el);
    },
    run: function() {
      this.convert(); 
    },
    convert: function() {
      // vars 
      var fls = this.qS('#files'),
          output = this.qS('.output'),
          overlay = this.qS('.overlay'),
          close_overlay = this.qS('.close_overlay');
      
      fls.addEventListener('change', function(e) {
        var file = fls.files[0],
            txtType = /text.*/, // all text files
            imgType = /image.*/, // all image files
            pdfType = /pdf.*/, // all pdf files
            fR = new FileReader(); // fileReader start
        
        fR.onload = function(e) {
          // if text 
          if (file.type.match(txtType)) {
            var rS = fR.result,
                // template 
                render =
                  '<li><b>Name: </b>  '+file.name+'</li>'+
                  '<li><b>Size: </b>  '+file.size+' Bytes</li>'+
                  '<li><b>Type: </b>  '+file.type+'</li>'+
                  '<li><b>Base64: </b></li>'+
                '</ul>'+
                '<pre class="textarea">'+rS+'</pre>';
            output.innerHTML = render; 
          // if image
          } else if(file.type.match(imgType)) {
            var rS2 = fR.result,
                // template
                tmpl = 
                '<img src="'+rS2+'" alt="'+file.name+'"><ul>'+
                  '<li><b>Name: </b>  '+file.name+'</li>'+
                  '<li><b>Size: </b>  '+file.size+' Bytes</li>'+
                  '<li><b>Type: </b>  '+file.type+'</li>'+
                  '<li><b>Base64: </b></li>'+
                '</ul>'+
                '<pre class="textarea">'+rS2+'</pre>';
            output.innerHTML = tmpl;
          // if pdf
          } else if(file.type.match(pdfType)) {
            var rS2 = fR.result,
                // template
                tmpl = 
                '<iframe src="'+rS2+'" alt="'+file.name+'" width="1000" height="700"></iframe><ul>'+
                  '<li><b>Name: </b>  '+file.name+'</li>'+
                  '<li><b>Size: </b>  '+file.size+' Bytes</li>'+
                  '<li><b>Type: </b>  '+file.type+'</li>'+
                  '<li><b>Base64: </b></li>'+
                '</ul>'+
                '<pre class="textarea">'+rS2+'</pre>';
            output.innerHTML = tmpl;
           // if not support
          }else{
            output.innerHTML = '<h1>Sorry, the file you uploaded is not supported</h1>';
          }
        };
        
        // on loaded add events
        fR.onloadend = function(e) {
          overlay.classList.add('show'); // add class
          close_overlay.onclick = function(){
            overlay.classList.remove('show'); // remove class
            fls.value = ''; // remove files
          };
        };  
        // convert to data uri
        fR.readAsDataURL(file); 
      });
    }
  };
})();

img2data.run();

// Base64 End

