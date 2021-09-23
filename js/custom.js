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
          const response = JSON.parse(xmlhttp.response)
          if (response) {
            let renderContent = `<ul>`
            for (let i = 0; i <= 10; i++) {
              const item = response[i]
              console.log(response)
              console.log(response[i])
              renderContent += `<li data-id="${item.id}">`
              renderContent += `<img src="https://img.icons8.com/material-outlined/24/000000/${item.completed ? 'ok' : 'error'}--v2.png"/>`
              renderContent += `<span>${item.title} (user id = ${item.userId})</span>`
              renderContent += `</li>`
            }

            renderContent += `<ul>`

            pre.innerHTML = renderContent
          } else {
            pre.innerHTML = 'Ooops... Something went wrong!'
          }
        }
      }
      xmlhttp.open("GET", 'https://jsonplaceholder.typicode.com/todos', true);
      xmlhttp.send();
    }

    button.onclick = fetchData;

    fetchData()

  });

}());

