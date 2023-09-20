console.log("start client");
window.addEventListener("load", function () {
  const form = document.querySelector("form");
  const submit = form.querySelector('button[type="submit"]');

  submit.addEventListener("click", function (event) {
    event.preventDefault();
    const nameInput = document.querySelector('input[name="Name"]');
    const name = nameInput ? nameInput.value || "user" : "user";

    const phone = document.querySelector('input[name="Phone"]').value;

    const href = window.location.href;
    const match = href.match(/utm_track_uid=([^&]+)/);

    let clientUid = null;

    if (match) {
      clientUid = match[1];
    }

    const data = {
      name: name,
      phone: phone,
      utm_track_uid: clientUid,
    };
    var jsonData = JSON.stringify(data);

    console.log("Data", jsonData);
const url = 'https://meyram-app.kz/api/v1/client';
//const url = 'https://httpbin.org/post';
  // Create a fetch POST request
  fetch(url, {
      method: 'POST',
      mode: 'no-cors', // Specify 'no-cors' mode
      headers: {
          'Content-Type': 'application/json'
      },
      body: jsonData
  })
  .then(function(response) {
      return response.text();
  })
  .then(function(responseText) {
      // Handle the response from the PHP script
      console.log("Response from server script: " + responseText);
  })
  .catch(function(error) {
      console.error("Error sending data to server script: " + error);
  });

  });
});