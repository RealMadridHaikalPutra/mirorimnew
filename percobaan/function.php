<?php

$konek = mysqli_connect("localhost","root","","mirorim");

if(isset($_POST['compare'])){
    $nama = $_POST['nama'];
    //$select = mysqli_query($konek, "SELECT * from temp_item INNER JOIN itembox ON temp_name.nama = itembox.nama AND temp_name.quantity=itembox.quantity" );
    $select = mysqli_query($konek, "SELECT * FROM temp_item INNER JOIN itembox WHERE temp_item.idbarang = itembox.idbarang");
    $data = mysqli_fetch_array($select);
    $ambilqty1 = $data['quantity_temp'];
    $ambilqty2 = $data['quantity'];

    if($ambilqty1==$ambilqty2){
        $insert = mysqli_query($konek, "INSERT INTO stok(nama, quantity) VALUES('$nama','$ambilqty1')");
    } else {
        echo 'gagal';
    }

}

//how to make rest api in php?
<?php

/*** this is the client ***/


if (isset($_GET["action"]) && isset($_GET["id"]) && $_GET["action"] == "get_user") // if the get parameter action is get_user and if the id is set, call the api to get the user information
{
  $user_info = file_get_contents('http://localhost:8888/api.php?action=get_user&id=' . $_GET["id"]);
  $user_info = json_decode($user_info, true);

  // THAT IS VERY QUICK AND DIRTY !!!!!
  ?>
    <table>
      <tr>
        <td>Name: </td><td> <?php echo $user_info["last_name"] ?></td>
      </tr>
      <tr>
        <td>First Name: </td><td> <?php echo $user_info["first_name"] ?></td>
      </tr>
      <tr>
        <td>Age: </td><td> <?php echo $user_info["age"] ?></td>
      </tr>
    </table>
    <a href="http://localhost:8888/client.php?action=get_userlist" alt="user list">Return to the user list</a>
  <?php
}
else // else take the user list
{
  $user_list = file_get_contents('http://localhost:8888/api.php?action=get_user_list');
  $user_list = json_decode($user_list, true);
  // THAT IS VERY QUICK AND DIRTY !!!!!
  ?>
    <ul>
    <?php foreach ($user_list as $user): ?>
      <li>
        <a href=<?php echo "http://localhost:8888/client.php?action=get_user&id=" . $user["id"]  ?> alt=<?php echo "user_" . $user_["id"] ?>><?php echo $user["name"] ?></a>
    </li>
    <?php endforeach; ?>
    </ul>
  <?php
}

?>


<?php

// This is the API to possibility show the user list, and show a specific user by action.

function get_user_by_id($id)
{
  $user_info = array();

  // make a call in db.
  switch ($id){
    case 1:
      $user_info = array("first_name" => "Marc", "last_name" => "Simon", "age" => 21); // let's say first_name, last_name, age
      break;
    case 2:
      $user_info = array("first_name" => "Frederic", "last_name" => "Zannetie", "age" => 24);
      break;
    case 3:
      $user_info = array("first_name" => "Laure", "last_name" => "Carbonnel", "age" => 45);
      break;
  }

  return $user_info;
}

function get_user_list()
{
  $user_list = array(array("id" => 1, "name" => "Simon"), array("id" => 2, "name" => "Zannetie"), array("id" => 3, "name" => "Carbonnel")); // call in db, here I make a list of 3 users.

  return $user_list;
}

$possible_url = array("get_user_list", "get_user");

$value = "An error has occurred";

if (isset($_GET["action"]) && in_array($_GET["action"], $possible_url))
{
  switch ($_GET["action"])
    {
      case "get_user_list":
        $value = get_user_list();
        break;
      case "get_user":
        if (isset($_GET["id"]))
          $value = get_user_by_id($_GET["id"]);
        else
          $value = "Missing argument";
        break;
    }
}

exit(json_encode($value));

?>




<!--DELIMITER-->Source: https://stackoverflow.com/questions/4684075







?>