<?php
require "db.php";
error_reporting(E_ALL);
ini_set('display_errors', 1);

$id = $_GET['id'];
echo $id;

$result = $conn->query("SELECT * FROM employees WHERE id=$id");
$row    = $result->fetch_assoc();

$roleResult    = $conn->query("SELECT role_id FROM employee_roles WHERE emp_id=$id");
$selectedroles = [];
while ($r = $roleResult->fetch_assoc()) {
    $selectedroles[] = $r['role_id'];
}

// print_r($selectedroles);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Edit Employee</title>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="../bootstrap.css">
</head>
<body>

<div class="container mt-5 mx-auto w-50 p-3">
    <div class="card shadow">
        <div class="card-header bg-primary-subtle text-center">
            <h4>Employee Registration Form</h4>
        </div>

        <div class="card-body">
            <form id="updateForm">

                <input type="hidden" name="id" value="<?php echo $row['id']; ?>">

                <div class="mb-3">
                    Name:
                    <input type="text" name="name" class="form-control" value="<?php echo $row['name']; ?>" required>
                </div>

                <div class="mb-3">
                    Email:
                    <input type="email" name="email" class="form-control" value="<?php echo $row['email']; ?>" required>
                </div>

                <div class="mb-3">
                    Age:
                    <input type="number" name="age" class="form-control" value="<?php echo $row['age']; ?>" required>
                </div>

                <div class="mb-3">
                    Phone Number:
                    <input type="text" name="phone" class="form-control" value="<?php echo $row['phone']; ?>" required>
                </div>

                <div class="mb-3">
                    City:
                    <input type="text" name="city" class="form-control" value="<?php echo $row['city']; ?>" required>
                </div>

                <div class="mb-3">
                    Roles:
                    <select id="roles" name="roles[]" class="select2 form-control" multiple>
                        <option value="1" <?= in_array(1, $selectedroles) ? 'selected' : '' ?>>Backend Developer</option>
                        <option value="2" <?= in_array(2, $selectedroles) ? 'selected' : '' ?>>HR</option>
                        <option value="3" <?= in_array(3, $selectedroles) ? 'selected' : '' ?>>Manager</option>
                        <option value="4" <?= in_array(4, $selectedroles) ? 'selected' : '' ?>>Full Stack Developer</option>
                        <option value="5" <?= in_array(5, $selectedroles) ? 'selected' : '' ?>>Frontend Developer</option>
                        <option value="6" <?= in_array(6, $selectedroles) ? 'selected' : '' ?>>Devops Engineer</option>
                        <option value="7" <?= in_array(7, $selectedroles) ? 'selected' : '' ?>>Intern</option>
                    </select>
                    <small class="text-danger" id="rolesError"></small>
                </div>

                <button type="submit" class="btn btn-success w-100">Update</button>

            </form>
        </div>
    </div>
</div>

<script>
$(document).ready(function() {
    $('#roles').select2({
        placeholder: "Select Roles",
        allowClear: true
    });

    let selected = <?php echo json_encode($selectedroles); ?>;
    $('#roles').val(selected).trigger('change');
});

function validateField(field, value, element) {
    $.post("validate.php", { field, value }, function(res) {
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
        validateField(this.name, this.value, this);
    });
});

$('#roles').on('change', function() {
    let val = $(this).val();
    $.post("validate.php", { field: "roles", value: val }, function(res) {
        document.getElementById("rolesError").innerText = res;
    });
});

$('#updateForm').on('submit', function(e) {
    e.preventDefault();

    let form = this;

    Swal.fire({
        title: 'Confirm Update?',
        text: "Are you sure you want to update?",
        showCancelButton: true,
        confirmButtonText: 'Yes, update it!',
        cancelButtonText: 'Cancel'
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url: 'update.php',
                method: 'POST',
                data: $(form).serialize(),
                success: function(res) {
                    if (res === "ok") {
                        window.location.href = 'display.php?status=updated';
                    } else {
                        Swal.fire({ icon: 'error', title: 'Error', html: res });
                    }
                }
            });
        }
    });
});
</script>

</body>
</html>