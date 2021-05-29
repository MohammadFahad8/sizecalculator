function addHeadTag(tag, options) {
    let item = document.createElement(tag);
    Object.assign(item, options, { async: false });
    document.querySelector("head").appendChild(item)
  }
  
  function avoidFouc() {
    document.body.style.opacity = 1;
  }
  addHeadTag('link', {
    rel: 'stylesheet',
    href: 'https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css',
    onload: avoidFouc
  });
  addHeadTag('script', {
    type: 'application/javascript',
    src: 'https://code.jquery.com/jquery-3.3.1.slim.min.js'
  });
  addHeadTag('script', {
    type: 'application/javascript',
    src: 'https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js'
  });
  addHeadTag('script', {
    type: 'application/javascript',
    src: 'https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js'
  });
var div = document.getElementById("ScriptApp")
div.innerHTML += '<html><body><button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">Launch demo modal</button><div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true"><div class="modal-dialog"><div class="modal-content"><div class="modal-header"><h5 class="modal-title" id="exampleModalLabel">Modal title</h5>        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>      </div><div class="modal-body">text</div><div class="modal-footer"><button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button><button type="button" class="btn btn-primary">Save changes</button></div></div></div></div></body></html>'
