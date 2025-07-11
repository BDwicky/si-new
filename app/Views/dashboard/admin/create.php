<form action="<?= base_url('/super-admin/store') ?>" method="post">
    <input type="text" name="username" placeholder="Username">
    <input type="text" name="name" placeholder="Nama Lengkap">
    <input type="email" name="email" placeholder="Email">
    <input type="text" name="nim" placeholder="NIM">
    <input type="text" name="fakultas" placeholder="Fakultas">
    <input type="text" name="program_studi" placeholder="Program Studi">
    <select name="role_id">
        <option value="1">Admin</option>
        <option value="2">UKM</option>
        <option value="3">User</option>
    </select>
    <input type="password" name="password" placeholder="Password">
    <button type="submit">Simpan</button>
</form>