<!DOCTYPE html>
<html lang="en">
<x-monheader>
</x-monheader>
<x-monnav>
</x-monnav>

<body>
  
  <div class="d-flex justify-content-center mt-5 py-3">
    <h2 class="mt-5 text-success fw-bold display-3">Contact</h2>
  </div>
  <div class="container formulaire mt-4 mb-5">

    <div class="row mb-3">

      <div class="col-lg-8 col-lg-offset-2 col-sm-12 response">
        <form id="contact-form" method="post" action="contact.php" role="form">

          <div class="messages"></div>

          <div class="controls">

            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label for="form_name">Prenom *</label>
                  <input id="form_name" type="text" name="name" class="form-control" placeholder="Entrez votre prenom" required="required" data-error="Firstname is required.">
                  <div class="help-block with-errors"></div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="form_lastname">Nom *</label>
                  <input id="form_lastname" type="text" name="surname" class="form-control" placeholder="Entrez votre nom" required="required" data-error="Lastname is required.">
                  <div class="help-block with-errors"></div>
                </div>
              </div>
            </div>
            <div class="row mt-4">
              <div class="col-md-6">
                <div class="form-group">
                  <label for="form_email">Email *</label>
                  <input id="form_email" type="email" name="email" class="form-control" placeholder="Entrez votre email" required="required" data-error="Valid email is required.">
                  <div class="help-block with-errors"></div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="form_phone">Telephone</label>
                  <input id="form_phone" type="tel" name="phone" class="form-control" placeholder="Entrez votre numero de telephone">
                  <div class="help-block with-errors"></div>
                </div>
              </div>
            </div>
            <div class="row mt-4">
              <div class="col-md-12">
                <div class="form-group">
                  <label for="form_message">Message *</label>
                  <textarea id="form_message" name="message" class="form-control" placeholder="votre commentaire" rows="4" required="required" data-error="S'il vous plaît, laissez-nous un message."></textarea>
                  <div class="help-block with-errors"></div>
                </div>
              </div>
              <div class="col-md-12 mt-3 text-center">
                <input type="submit" class="btn btn-success btn-send" value="Envoyer">
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
  <x-monfooter>
  </x-monfooter>
  <x-monbody>
  </x-monbody>
</body>

</html>