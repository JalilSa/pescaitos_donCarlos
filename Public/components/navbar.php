

<div class="modal fade" id="contactModal" tabindex="-1" aria-labelledby="contactModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="contactModalLabel">Contacta con nosotros</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <!-- Formulario de contacto -->
        <form id="contactForm">
          <div class="mb-3">
            <label for="userEmail" class="form-label">Tu email</label>
            <input type="email" class="form-control" id="userEmail" required>
          </div>
          <div class="mb-3">
            <label for="userMessage" class="form-label">Mensaje</label>
            <textarea class="form-control" id="userMessage" required></textarea>
          </div>
          <button type="submit" class="btn btn-primary">Enviar</button>
        </form>
      </div>
    </div>
  </div>
</div>

<header data-bs-theme="dark">
  <!-- Sección de información y contacto -->
  <section class="collapse text-bg-dark" id="navbarHeader">
    <div class="container">
      <div class="row">
        <!-- Sección de información -->
        <div class="col-sm-8 col-md-7 py-4">
          <h4>Información</h4>
          <p class="text-body-secondary">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Quo sed incidunt ipsam praesentium expedita accusamus a consequuntur error ea cupiditate mollitia dolorem voluptatibus, quidem, pariatur eos id soluta dolorum ducimus.</p>
        </div>
        <!-- Sección de contacto -->
        <div class="col-sm-4 offset-md-1 py-4">
          <h4>Contáctanos</h4>
          <ul class="list-unstyled">
            <li><a href="#" class="text-white">Búscanos en X</a></li>
            <li><a href="#" class="text-white">Facebook</a></li>
            <li><a href="#" class="text-white" data-bs-toggle="modal" data-bs-target="#contactModal">Mail de contacto</a></li>
          </ul>
        </div>
      </div>
    </div>
  </section>

  <!-- Barra de navegación -->
  <nav class="navbar navbar-dark bg-dark shadow-sm">
    <div class="container">
      <!-- Brand/logo -->
      <a href="#" class="navbar-brand d-flex align-items-center">
      <svg class="fish" xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 256 256"><path fill="currentColor" d="M172 76a16 16 0 1 1-16-16a16 16 0 0 1 16 16Zm63.64 13.45c-1.79 28-10.08 51.53-24.64 70c-21.14 26.86-54.44 41.69-99.06 44.16L91 249a12 12 0 0 1-10.89 7h-.81a12 12 0 0 1-10.66-8.44l-14.16-46l-46-14.19A12 12 0 0 1 7 165l45.4-20.92C54.85 99.44 69.7 66.14 96.56 45c18.49-14.56 42-22.84 70-24.64A189.64 189.64 0 0 1 216.69 24A20 20 0 0 1 232 39.31a189.6 189.6 0 0 1 3.64 50.14Zm-84.11 82.8a57.12 57.12 0 0 1-11.13-8.65a55.81 55.81 0 0 1-15.9-32.1a55.81 55.81 0 0 1-32.1-15.9a56.93 56.93 0 0 1-8.63-11.13q-7 20.48-7.7 47.69a12 12 0 0 1-7 10.61l-23.56 10.87l22.1 6.82a12 12 0 0 1 7.93 7.94l6.8 22.09l10.89-23.59a12 12 0 0 1 10.61-7q27.16-.61 47.69-7.65Zm57.54-125.32c-14.71-2.84-63.85-9.68-97.67 16.93A77 77 0 0 0 100 74.9a32 32 0 0 0 35 32.95a12 12 0 0 1 13.09 13.09a32 32 0 0 0 33 35a76.69 76.69 0 0 0 11-11.35c26.67-33.78 19.82-82.94 16.98-97.66Z"/></svg>        <strong>Pescaitos DonCarlos</strong>

      </a>
      <!-- Botón de toggle para la barra de navegación en pantallas pequeñas -->
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarHeader" aria-controls="navbarHeader" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
    </div>
  </nav>
</header>



<script>
document.getElementById('contactForm').addEventListener('submit', function(e) {
    e.preventDefault();

    let userEmail = document.getElementById('userEmail').value;
    let userMessage = document.getElementById('userMessage').value;

    // Crear un objeto para mandar los datos del formulario
    let formData = new FormData();
    formData.append('email', userEmail);
    formData.append('message', userMessage);

    // Enviar los datos al servidor 
    fetch('./components/send_email.php', {
        method: 'POST',
        body: formData
    })
    .then(response => response.text())
    .then(data => {
        console.log(data);
        $('#contactModal').modal('hide');
        document.getElementById('contactForm').reset();
    })
    .catch(error => {
        console.error('Error:', error);
    });
});
</script>

