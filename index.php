<?php
include 'db.php';
include 'functions.php';

$result = select_groups($conn);

if (!$result) {
    die("Query failed: " . mysqli_error($conn));
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Liste des Groupes</title>
    <link rel="stylesheet" href="assets/css/styles.css">
</head>
<body>
    <h1>Liste des Groupes</h1>
    <ul>
        <?php while($row = mysqli_fetch_assoc($result)): ?>
            <li>
                <a href="group.php?id=<?php echo $row['id']; ?>"><?php echo $row['name']; ?></a>
                <a href="delete_group.php?id=<?php echo $row['id']; ?>">Supprimer</a>
            </li>
        <?php endwhile; ?>
    </ul>
    <form action="add_group.php" method="post">
        <input type="text" name="name" placeholder="Nom du Groupe" required>
        <button type="submit">Ajouter Groupe</button>
    </form>
    <script src="assets/js/scripts.js"></script>
</body>
</html>


