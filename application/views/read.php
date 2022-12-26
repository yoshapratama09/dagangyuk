<!DOCTYPE html>
<html lang="en">

<head>
    <title>Blog Saya</title>
</head>

<body>
    <h1>Daftar Artikel</h1>
    <?php foreach ($posts as $post) : ?>
        <h2> ID : <?php echo $post->id; ?></h2>
        <h2>email :<?php echo $post->email; ?></h2>
        <h2>email :<?php echo $post->username; ?></h2>
        <p><br>password : <?php echo $post->password; ?>
            <a href="<?php echo base_url('index.php/blog/delete/' . $post->id); ?>">Hapus</a>
            <a href="<?php echo base_url('index.php/blog/update/' . $post->id); ?>">Update</a>
        </p>
    <?php endforeach; ?>
    <br><br>
    <a href="<?php echo base_url('index.php/blog/create/' . $post->id); ?>"><input type="submit" name="submit" id="submit" value="Tambahkan Data Baru"></a>

</body>

</html>