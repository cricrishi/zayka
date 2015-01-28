function FileAPI (d, f) {

        fileField = f,
        dropZone = d,
        
        preview = null;


    this.init = function () {
        fileField.onchange = this.addFiles;
        dropZone.addEventListener("dragenter",  this.stopProp, false);
        dropZone.addEventListener("dragleave",  this.dragExit, false);
        dropZone.addEventListener("dragover",  this.dragOver, false);
        dropZone.addEventListener("drop",  this.showDroppedFiles, false);
    }

    this.addFiles = function () {
        upload(this.files);
    }

    this.showDroppedFiles = function (ev) {
        ev.stopPropagation();
        ev.preventDefault();
        var files = ev.dataTransfer.files;
		
		upload(files); 
		    }

    

    this.dragOver = function (ev) {
        ev.stopPropagation();
        ev.preventDefault();
        this.style["backgroundColor"] = "#F0FCF0";
        this.style["borderColor"] = "#3DD13F";
        this.style["color"] = "#3DD13F"
    }

    this.dragExit = function (ev) {
        ev.stopPropagation();
        ev.preventDefault();
        dropZone.style["backgroundColor"] = "#FEFEFE";
        dropZone.style["borderColor"] = "#CCC";
        dropZone.style["color"] = "#CCC"
    }

    this.stopProp = function (ev) {
        ev.stopPropagation();
        ev.preventDefault();
    }

    
    
  
    var upload = function (files) {
		
		var file=files[0];
 if (file.type.search(/image\/.*/) != -1) 
 {
 var fr = new FileReader();
            fr.file = file;
            fr.onloadend = function(ev){
				var thumb = new Image();
				thumb.src = ev.target.result;
				thumb.width=230;
				thumb.height=250;
				dropZone.style["border"] = "solid 2px #333";
				dropZone.innerHTML="";
                dropZone.appendChild(thumb);
  
				};
            fr.readAsDataURL(file);		
		
		
		
			  
        var fd = new FormData();
        fd.append("file",file);
if (file) {
          var fileSize = 0;
          if (file.size > 1024 * 1024)
            fileSize = (Math.round(file.size * 100 / (1024 * 1024)) / 100).toString() + 'MB';
          else
            fileSize = (Math.round(file.size * 100 / 1024) / 100).toString() + 'KB';

          document.getElementById('fileName').innerHTML = 'Name: ' + file.name;
          document.getElementById('fileSize').innerHTML = 'Size: ' + fileSize;
          document.getElementById('fileType').innerHTML = 'Type: ' + file.type;
        }
        var xhr = new XMLHttpRequest();
		xhr.upload.addEventListener('progress', function(event) {
    if (event.lengthComputable) {
        document.getElementById("progressNumber").innerHTML = 'Uploaded '+Math.round(event.loaded * 100 / event.total)+'%';
    }
}, false);
 
        xhr.addEventListener("load", uploadComplete, false);
        xhr.addEventListener("error", uploadFailed, false);
        xhr.addEventListener("abort", uploadCanceled, false);
        xhr.open("POST", "upload.php");
        xhr.send(fd);
  
 }else
 {
	 var m=document.getElementById('uploadmsg');
	 m.innerHTML="Upload images only";
	    m.style["color"] = "red";

	 
	 
	 }
 
  
        
    }
    
	

      function uploadComplete(evt) {
        /* This event is raised when the server send back a response */
      //  alert(evt.target.responseText);
      }

      function uploadFailed(evt) {
        alert(evt.target.responseText);
      }

      function uploadCanceled(evt) {
        alert("The upload has been canceled by the user or the browser dropped the connection.");
      }
	

	
}



function abc() {
    if (typeof FileReader == "undefined") alert ("Sorry your browser does not support the File API ");
    FileAPI = new FileAPI( 
       document.getElementById("upload"),
        document.getElementById("fileField")
    );
    FileAPI.init();
    
}

abc();