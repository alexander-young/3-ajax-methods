const getStoreBtnRest = document.getElementById('get_store_rest');

if (getStoreBtnRest) {

  getStoreBtnRest.addEventListener('click', (e) => {
    e.preventDefault();

    fetch('/wp-json/wpc/v1/stores/6/').then(response => {

      return response.json();

    }).then(jsonResponse => {

      console.log({ jsonResponse });

    });

  });

}
