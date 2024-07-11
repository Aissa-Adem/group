<?php
include 'db.php';
include 'functions.php';

$data = select_group($conn);
$group = $data['group'];
$questions_result = $data['questions'];

if (!$questions_result) {
    die("Query failed: " . mysqli_error($conn));
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Détails du Groupe</title>
    <link rel="stylesheet" href="assets/css/styles.css">
</head>
<body>
    <h1>Questions pour <?php echo $group['name']; ?></h1>
    <ul>
        <?php while($question = mysqli_fetch_assoc($questions_result)): ?>
            <li>
                <?php echo $question['question_text']; ?> (<?php echo $question['question_type']; ?>)
                <a href="delete_question.php?id=<?php echo $question['id']; ?>&group_id=<?php echo $group['id']; ?>">Supprimer</a>
            </li>
        <?php endwhile; ?>
    </ul>
    <form action="add_question.php" method="post">
        <input type="hidden" name="group_id" value="<?php echo $group['id']; ?>">
        <input type="text" name="question_text" placeholder="Nouvelle Question" required>
        <select name="question_type" required>
            <option value="note">Note</option>
            <option value="texte">Texte</option>
            <option value="choix">Choix</option>
            <option value="oui/non">Oui/Non</option>
        </select>
        <button type="submit">Ajouter Question</button>
    </form>
    <a href="index.php">Retour à la liste des Groupes</a>
    <script src="assets/js/scripts.js"></script>
</body>
</html>


