console.log("start client");
window.addEventListener("load", function() {
  const form = document.querySelector('form');
  const submit = form.querySelector('button[type="submit"]');

  submit.addEventListener("click", function(event) {
    event.preventDefault();
    const nameInput = document.querySelector('input[name="Name"]');
    const name = nameInput ? nameInput.value || "user" : "user";

    const phone = document.querySelector('input[name="Phone"]').value;


    const hash = window.location.hash;
    const match = hash.match(/utm_track_uid=([^&]+)/);

    let clientUid = null;

    if (match) {
      clientUid = match[1];
    }

    const data = {
      name: name,
      phone: phone,
      utm_track_uid: clientUid
    };

    console.log("Data", data);
    const apiUrl = 'https://meyram-app.kz/htdocs/plugins/devmax/trackerclient/client/client.php';

    fetch(apiUrl, {
      method: 'POST',
      body: JSON.stringify(data),
      headers: {
        'Content-Type': 'application/json'
      }
    })
      .then(response => response.json())
      .then(data => {
        console.log('Success:', data);
      })
      .catch(error => {
        console.error('Error:', error);
      });
  });

});