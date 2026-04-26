<?php
require "db.php";

$sql = "SELECT
            e.id,
            e.name,
            e.email,
            e.age,
            e.phone,
            e.city,
            r.role_name
        FROM employees e
        LEFT JOIN employee_roles er ON e.id = er.emp_id
        LEFT JOIN roles r ON er.role_id = r.id";

$result    = $conn->query($sql);

$employees = [];

while ($row = $result->fetch_assoc()) {
    $id = $row['id'];
    if (!isset($employees[$id])) {
        $employees[$id] = [
            'id'    => $row['id'],
            'name'  => $row['name'],
            'email' => $row['email'],
            'age'   => $row['age'],
            'phone' => $row['phone'],
            'city'  => $row['city'],
            'roles' => []
        ];
    }
    if ($row['role_name']) {
        $employees[$id]['roles'][] = $row['role_name'];
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Employees</title>
    <link rel="stylesheet" href="../bootstrap.css">
</head>
<body>

<div class="container mt-5">
    <div class="card shadow">
        <div class="card-header bg-primary-subtle text-center">
            <h4>Employee List</h4>
        </div>

        <div class="card-body">

<?php if (!empty($employees)): ?>

<table class="table table-bordered table-striped table-hover text-center">
    <thead class="table-dark">
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Age</th>
            <th>Phone</th>
            <th>City</th>
            <th>Role</th>
            <th colspan="2">Action</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($employees as $key => $value): ?>
        <tr>
            <td><?= $key . ' ' . $value['name']; ?></td>
            <td><?= $value['email']; ?></td>
            <td><?= $value['age']; ?></td>
            <td><?= $value['phone']; ?></td>
            <td><?= $value['city']; ?></td>
            <td><?= implode(", ", $value['roles']); ?></td>
            <td>
                <a href="edit.php?id=<?= $value['id']; ?>" class="btn btn-sm btn-warning">Edit</a>
            </td>
            <td>
                <button class="btn btn-danger btn-sm deleteBtn" data-id="<?= $value['id']; ?>">Delete</button>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<?php else: ?>
    <p class="text-center text-danger">No records found</p>
<?php endif; ?>

        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<?php if (isset($_GET['status'])): ?>
<script>
const Toast = Swal.mixin({
    toast: true,
    position: 'top-right',
    showConfirmButton: false,
    timer: 2000
});

let status = "<?php echo $_GET['status']; ?>";

if (status === "inserted") {
    Toast.fire({ title: 'Employee added successfully' });
} else if (status === "updated") {
    Toast.fire({ title: 'Employee updated successfully' });
} else if (status === "deleted") {
    Toast.fire({ title: 'Employee deleted successfully' });
}

history.replaceState(null, '', 'display.php');

</script>
<?php endif; ?>

<script>
document.querySelectorAll('.deleteBtn').forEach(btn => {
    btn.addEventListener('click', function() {
        let id = this.dataset.id;
        let row = this.closest('tr');

        Swal.fire({
            title: 'Confirm delete?',
            showCancelButton: true
        }).then(res => {
            if (res.isConfirmed) {
                fetch('delete.php?id=' + id)
                    .then(r => r.text())
                    .then(response => {
                        if (response.trim() === "ok") {
                            row.remove();
                            Swal.mixin({
                                toast: true,
                                position: 'top-right',
                                showConfirmButton: false,
                                timer: 2000
                            }).fire({ title: 'Employee deleted successfully' });
                        } else {
                            Swal.fire({ icon: 'error', title: 'Error', text: response });
                        }
                    });
            }
        });
    });
});
</script>

</body>
</html>