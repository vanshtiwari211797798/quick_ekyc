<?php
include('../includes/config.php');
if (!isset($_SESSION['loggedin']) == true) {
?>
    <script>
        window.location.href = '../login.php';
    </script>
<?php
}
?>