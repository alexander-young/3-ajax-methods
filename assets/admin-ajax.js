const contactForm = document.getElementById('contact-form');

if (contactForm) {

  contactForm.addEventListener('submit', (e) => {
    e.preventDefault();

    fetch('/wp-admin/admin-ajax.php', {
      method: 'POST',
      headers: {
        'Content-Type': 'application/x-www-form-urlencoded'
      },
      body: new URLSearchParams(new FormData(contactForm))
    }).then(response => {

      return response.json();

    }).then(jsonResponse => {

      console.log({ jsonResponse });

    });

  });

}
