<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>User Form</title>
    <style>
        .error-feedback { color: red; }
    </style>
</head>
<body>
    <form method="POST">
        <label for="first_name">First Name:</label>
        <input type="text" name="first_name" value="<?= htmlspecialchars($data['first_name'] ?? '') ?>">
        <?php if (isset($errors['first_name'])): ?>
            <?php foreach ($errors['first_name'] as $error): ?>
                <span class="error-feedback"><?= $error ?></span>
            <?php endforeach; ?>
        <?php endif; ?>
        <br>

        <label for="date_of_birth">Date of Birth:</label>
        <input type="date" name="date_of_birth" value="<?= htmlspecialchars($data['date_of_birth'] ?? '') ?>">
        <?php if (isset($errors['date_of_birth'])): ?>
            <?php foreach ($errors['date_of_birth'] as $error): ?>
                <span class="error-feedback"><?= $error ?></span>
            <?php endforeach; ?>
        <?php endif; ?>
        <br>

        <button type="submit">Submit</button>
    </form>
</body>
</html>