<?php
session_start();

if (isset($_POST['pasword'])) {
    $enteredPassword = $_POST['pasword'];

    // To'g'ri parol
    $correctPassword = 'ABDUMUTOLIB20100301';

    // Parolni solishtirish
    if (password_verify($enteredPassword, password_hash($correctPassword, PASSWORD_DEFAULT))) {
        // Agar parol to'g'ri bo'lsa, sesiyaga saqlang va ikkinchi sahifaga o'ting
        $_SESSION['authenticated'] = true;
        header("Location: second_page.php");
        exit();
    } else {
        // Aks holda hatolikni bildirish
        echo '<center>' . "Noto'g'ri parol. Iltimos, qaytadan kiriting." . '</center>' ;
    }
} else {
    // Forma orqali kelmagan bo'lsa, kirish sahifasiga qaytaymiz
    header("Location: index.php");
    exit();
}
?>
