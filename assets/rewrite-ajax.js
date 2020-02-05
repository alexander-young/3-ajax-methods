const getStoreBtn = document.getElementById('get_store');

if (getStoreBtn) {

  getStoreBtn.addEventListener('click', (e) => {
    e.preventDefault();

    fetch('/api/stores/5/').then(response => {

      return response.json();

    }).then(jsonResponse => {

      console.log({ jsonResponse });
      
    });

  });

}
