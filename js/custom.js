'use strict';
'use strict';

(function () {

  document.addEventListener('readystatechange', ()=> {

    const button = document.querySelectorAll(".fetch-button")[0]

    function fetchData() {
      const pre = document.querySelectorAll('.ajax-content')[0]

      pre.innerHTML = 'Loading...'

      let xmlhttp;

      xmlhttp = new XMLHttpRequest();
      xmlhttp.onreadystatechange = function(){
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200){
          const response = xmlhttp.response
          if (response) {
            pre.innerHTML = response
            button.remove()
          } else {
            pre.innerHTML = 'Ooops... Something went wrong!'
          }
        }
      }
      xmlhttp.open("GET", 'https://jsonplaceholder.typicode.com/todos', true);
      xmlhttp.send();
    }

    button.onclick = fetchData;

  });

}());

