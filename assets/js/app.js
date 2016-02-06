function escapeTags( str ) {
    return String( str )
        .replace( /&/g, '&amp;' )
        .replace( /"/g, '&quot;' )
        .replace( /'/g, '&#39;' )
        .replace( /</g, '&lt;' )
        .replace( />/g, '&gt;' );
}

function inArray(needle, haystack) {
    var length = haystack.length;
    for(var i = 0; i < length; i++) {
        if(haystack[i] == needle) return true;
    }
    return false;
}

window.onload = function() {
    var btn = document.getElementById('uploadBtn'),
        progressBar = document.getElementById('progressBar'),
        progressOuter = document.getElementById('progressOuter'),
        msgBox = document.getElementById('msgBox'),
        filenames = [];

    var uploader = new ss.SimpleUpload({
        button: btn,
        url: 'file_upload.php',
        name: 'uploadfile',
        multipart: true,
        hoverClass: 'hover',
        focusClass: 'focus',
        responseType: 'json',
        onChange: function(filename) {
            if (inArray(filename, filenames)) {
                return false;
            }
            filenames.push(filename);
        },
        startXHR: function() {
            progressOuter.style.display = 'block';
            this.setProgressBar( progressBar );
        },
        onSubmit: function() {
            btn.innerHTML = 'Uploading...';
        },
        onComplete: function( filename, response ) {
            btn.innerHTML = 'Choose Another File';
            progressOuter.style.display = 'none';

            if ( !response ) {
                return;
            }

            if ( response.success === true ) {
                var iDiv = document.createElement('div');
                iDiv.id = 'block';
                iDiv.className = 'item';
                iDiv.setAttribute('data-w', response.size[0]);
                iDiv.setAttribute('data-h', response.size[1]);
                document.getElementById('car').appendChild(iDiv);
                var innerDiv = document.createElement('img');
                innerDiv.setAttribute('src', response.src);
                iDiv.appendChild(innerDiv);
                new imageImage({selector: '#car', rowHeight: 200});
            }
        },
        onError: function() {
            progressOuter.style.display = 'none';
        }
    });
};