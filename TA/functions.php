<?php 
    // membuat koneksi
    $conn = mysqli_connect('localhost','root','','TILOG');


    function query($query){
        global $conn;
        $result = mysqli_query($conn, $query);
        $rows=[];
        while($row = mysqli_fetch_assoc($result)){
            $rows[]=$row;
        }
        return $rows;
    }
    
    function daftar($data){
        global $conn;
        $username = strtolower(stripslashes($data["username"]));
        $password = mysqli_real_escape_string($conn, $data["password"]);
        $password2 = mysqli_real_escape_string($conn, $data["password2"]);

        if( $password !== $password2 ){
            echo"
                <script>
                    alert('Konfirmasi password salah!');
                </script>
            ";
            return false;
        }
        $password = password_hash($password, PASSWORD_DEFAULT);

        mysqli_query($conn, "INSERT INTO tbl_daftar VALUES('','$username','$password')");

        return mysqli_affected_rows($conn);
    }

    function tambah($data){
        global $conn;

        $nama = $data["nama"];
        $email = $data["email"];
        $phone = $data["phone"];
        $prodi = $data["prodi"];
        $asal = $data["asal"];

        $query = "INSERT INTO data_mhs 
                    VALUES
                    ('','$nama','$email','$phone','$prodi','$asal')
                    ";
        mysqli_query($conn, $query);

        return mysqli_affected_rows($conn);
    }

   function hapus($id){
    global $conn;
    mysqli_query($conn, "DELETE FROM data_mhs WHERE id = $id");
    return mysqli_affected_rows($conn);
   }
   function edit($data){
    global $conn;

        $id = $data["id"];
        $nama = $data["nama"];
        $email = $data["email"];
        $phone = $data["phone"];
        $prodi = $data["prodi"];
        $asal = $data["asal"];

        $query = "UPDATE data_mhs SET
                    nama = '$nama',
                    email = '$email',
                    phone = '$phone',
                    prodi = '$prodi',
                    asal = '$asal'
                    WHERE id = $id
                    ";
        mysqli_query($conn, $query);

        return mysqli_affected_rows($conn);
}

?>