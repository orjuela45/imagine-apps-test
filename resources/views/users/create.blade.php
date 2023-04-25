<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Create user</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
</head>
<body>
  <script>
  </script>
  <div class="container justify-content-center">
    <h1 class="p-2 mt-3">Create new user</h1>
    <form class="col-5">
      <div class="form-group">
        <label for="nameUser">Name</label>
        <input type="text" class="form-control" id="nameUser">
      </div>
      <div class="form-group">
        <label for="emailUser">Email</label>
        <input type="email" class="form-control" id="emailUser">
      </div>
      <div class="form-group">
        <label for="passwordUser">Password</label>
        <input type="password" class="form-control" id="passwordUser">
      </div>
      <button type="submit" class="btn btn-primary mt-4" id="btnSubmit">Submit</button>
      <a class="btn btn-success mt-4" href="/">Return</a>
    </form>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.min.js" integrity="sha384-heAjqF+bCxXpCWLa6Zhcp4fu20XoNIA98ecBC1YkdXhszjoejr5y9Q77hIrv8R9i" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script>
    const btnSubmit = document.getElementById("btnSubmit")
    
    btnSubmit.addEventListener("click", (e) => {
      e.preventDefault();
      const nameUser = document.getElementById("nameUser").value
      const emailUser = document.getElementById("emailUser").value
      const passwordUser = document.getElementById("passwordUser").value
      if (nameUser.trim() == ''){
        Swal.fire({
          icon: 'warning',
          title: 'Warning',
          text: 'The name is requerid!',
        })
        return
      }
      if (emailUser.trim() == ''){
        Swal.fire({
          icon: 'warning',
          title: 'Warning',
          text: 'The email is requerid!',
        })
        return
      }
      if (!validateEmail(emailUser)){
        Swal.fire({
          icon: 'warning',
          title: 'Warning',
          text: 'The email is not valid',
        })
        return
      }
      if (passwordUser.trim() == ''){
        Swal.fire({
          icon: 'warning',
          title: 'Warning',
          text: 'The password is requerid!',
        })
        return
      }

      axios.post('/api/create', {
        name: nameUser,
        email: emailUser,
        password: passwordUser
      })
      .then(function (response) {
        window.location.href = "/"
      })
      .catch(function (error) {
        Swal.fire({
          icon: 'error',
          title: 'Error',
          text: error.response.data,
        })
        return
      });
    })

    const validateEmail = (email) => {
      return String(email)
        .toLowerCase()
        .match(
          /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|.(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/
        );
    };
    
  </script>
</body>
</html>