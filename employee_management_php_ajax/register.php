<!DOCTYPE html>
<html>
<head>
    <title>Register</title>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="../bootstrap.css">
</head>
<body>

<div class="container mt-5 mx-auto w-50 p-3">
    <div class="card shadow">
        <div class="card-header bg-primary-subtle text-secondary-subtle text-center">
            <h4>Employee Registration Form</h4>
        </div>

        <div class="card-body">
            <form id="registerForm">

                <div class="mb-3">
                    Name:
                    <input type="text" id="name" name="name" class="form-control">
                    <div class="invalid-feedback"></div>
                </div>

                <div class="mb-3">
                    Email:
                    <input type="email" id="email" name="email" class="form-control">
                    <div class="invalid-feedback"></div>
                </div>

                <div class="mb-3">
                    Age:
                    <input type="number" id="age" name="age" class="form-control">
                    <div class="invalid-feedback"></div>
                </div>

                <div class="mb-3">
                    Phone Number:
                    <input type="text" id="phone" name="phone" class="form-control">
                    <div class="invalid-feedback"></div>
                </div>

                <div class="mb-3">
                    City:
                    <input type="text" id="city" name="city" class="form-control">
                    <div class="invalid-feedback"></div>
                </div>

                <div class="mb-3">
                    Roles:
                    <select id="roles" name="roles[]" class="form-control select2" multiple>
                        <option value="1">Backend Developer</option>
                        <option value="2">HR</option>
                        <option value="3">Manager</option>
                        <option value="4">Full Stack Developer</option>
                        <option value="5">Frontend Developer</option>
                        <option value="6">Devops Engineer</option>
                        <option value="7">Intern</option>
                    </select>
                    <small class="text-danger" id="rolesError"></small>
                </div>

                <button type="submit" class="btn btn-success w-100">Register</button>

            </form>
        </div>
    </div>
</div>

<script>

$(document).ready(function() {
    $('.select2').select2({
        placeholder: "Select Roles",
    });
});

function validateField(field, value, element) {
    $.post("validate.php", { field, value }, function(res) {
        // console.log(res);
        let feedback = element.nextElementSibling;
        if (res !== "") {
            element.classList.add("is-invalid");
            element.classList.remove("is-valid");
            if (feedback) feedback.innerText = res;
        } else {
            element.classList.remove("is-invalid");
            element.classList.add("is-valid");
            if (feedback) feedback.innerText = "";
        }
    });
}
document.querySelectorAll("input").forEach(input => {
    input.addEventListener("input", function() {
        // console.log(this.name);
        // console.log(this.value);
        validateField(this.name, this.value, this);
    });
});

$('#roles').on('change', function() {
    let val = $(this).val();
    // console.log(val);
    $.post("validate.php", { field: "roles", value: val }, function(res) {
        document.getElementById("rolesError").innerText = res;
    });
});

$('#registerForm').on('submit', function(e) {
    e.preventDefault();

    $.ajax({
        url: 'insert.php',
        method: 'POST',
        data: $(this).serialize(),
        success: function(res) {
            if (res.trim() === "ok") {
                Swal.fire({
                    icon: 'success',
                    title: 'Employee Registered!',
                    timer: 2000,
                    showConfirmButton: false
                }).then(() => {
                    window.location.href = 'display.php?status=inserted';
                });
            } else {
                Swal.fire({  title: 'Invalid Fields ', html: res });
            }
        }
    });
});
</script>

</body>
</html>