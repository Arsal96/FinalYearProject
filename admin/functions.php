<?php 
include('db_config.php');

$action =$_GET['action'];

  switch( $action ) {

      // <<------------------------------------------------ FETCH SINGLE USER  --------------------------------->>>>>>>>>>>>>>>>

    case "fetch_single":{
        if(isset($_POST["user_id"]))
        {
         $output = array();
         $statement = $connection->prepare(
          "SELECT * FROM patient 
          WHERE id = '".$_POST["user_id"]."' 
          LIMIT 1"
         );
         $statement->execute();
         $result = $statement->fetchAll();
         foreach($result as $row)
         {
          $output["first_name"] = $row["f_name"];
          $output["last_name"] = $row["l_name"]; 
          $output["dob"] = $row["dob"];
          $output["address"] = $row["address"];       
          $output["phno"] = $row["contact_no"];
         
          if($row["img"] != '')
          {
           $output['user_image'] = '<img src="userimgs/'.$row["img"].'" class="img-thumbnail" width="70" height="55" /><input type="hidden" name="hidden_user_image" value="'.$row["img"].'" />';
          }
          else
          {
           $output['user_image'] = '<input type="hidden" name="hidden_user_image" value="" />';
          }
        
         }
         echo json_encode($output);
        }
        



    }
    break;

      // <<------------------------------------------------ DELETE SINGLE USER  --------------------------------->>>>>>>>>>>>>>>>

  case "delete":
    {
      
if(isset($_POST["user_id"]))
{
 $image = get_image_name($_POST["user_id"]);
 if($image != '')
 {
  unlink("userimgs/" . $image);
 }
 $statement = $connection->prepare(
  "DELETE FROM patient WHERE id = :id"
 );
 $result = $statement->execute(
  array(
   ':id' => $_POST["user_id"]
  )
 );
 
  if(!empty($result))
  {
    //echo 'Data Deleted';
  }
}
    }
    
    break;

      // <<------------------------------------------------ INSERT SINGLE USER  --------------------------------->>>>>>>>>>>>>>>>


    case "insert":{

        if(isset($_POST["operation"]))
        {
         if($_POST["operation"] == "Add")
         {
          $image = '';
          if($_FILES["user_image"]["name"] != '')
          {
           $image = upload_image();
          }
          $statement = $connection->prepare("
           INSERT INTO patient (f_name, l_name,address,contact_no,dob,img) 
           VALUES (:first_name, :last_name, :address,:phno,:dob,:image)
          ");
          $result = $statement->execute(
           array(
            ':first_name' => $_POST["first_name"],
            ':last_name' => $_POST["last_name"],
            ':address' => $_POST["address"],
            ':phno' =>$_POST["phno"],
            ':dob' => $_POST["dob"],
            ':image'  => $image,
             
           )
          );
          if(!empty($result))
          {
           echo 'Data Inserted';
          }
         }
         if($_POST["operation"] == "Edit")
         {
          $image = '';
          if($_FILES["user_image"]["name"] != '')
          {
           $image = upload_image();
          }
          else
          {
           $image = $_POST["hidden_user_image"];
          }
          $statement = $connection->prepare(
           "UPDATE patient SET f_name = :first_name, l_name = :last_name, address = :address, dob = :dob, contact_no = :phno, img=:image WHERE id = :id");
          $result = $statement->execute(
           array(
            ':first_name' => $_POST["first_name"],
            ':last_name' => $_POST["last_name"],
            ':phno' =>$_POST["phno"],
            ':address' => $_POST["address"],
            ':dob' => $_POST["dob"],
             ':image'  => $image,
            ':id'   => $_POST["user_id"]
           )
          );
          if(!empty($result))
          {
           //echo "Data Inserted";

          }
         }
        }
    }
break;
      // <<------------------------------------------------ FETCH ALL USER  --------------------------------->>>>>>>>>>>>>>>>


    case "fetch":
    {

        $query = '';
        $output = array();
        $query .= "SELECT * FROM patient";
        if(isset($_POST["search"]["value"]))
        {
         // $query .= 'WHERE l_name LIKE "%'.$_POST["search"]["value"].'%" ';
         // $query .= 'OR address LIKE "%'.$_POST["search"]["value"].'%" ';
        }
        // if(isset($_POST["order"]))
        // {
        //   $query .= 'ORDER BY '.$_POST['order']['0']['column'].' '.$_POST['order']['0']['dir'].' ';
        // }
        // else
        // {
        //   $query .= 'ORDER BY id DESC ';
        // }
        // if($_POST["length"] != -1)
        // {
        //   $query .= 'LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
        // }
        $statement = $connection->prepare($query);
        $statement->execute();
        $result = $statement->fetchAll();
        $data = array();
        $filtered_rows = $statement->rowCount();
        foreach($result as $row)
        {
         $image = '';
         if($row["img"] != '')
         {
          $image = '<img src="userimgs/'.$row["img"].'" class="img-thumbnail" width="60" height="55" />';
         }
         else
         {
          $image = '';
         }
         $sub_array = array();
         $sub_array[] = $image;
         $sub_array[] = $row["f_name"];
         $sub_array[] = $row["l_name"];
         $sub_array[] = $row["address"];
         $sub_array[] = $row["contact_no"];
         $sub_array[] = "<a  href='dashboard.php?id=".$row["id"]."'>Appoinments</button>";
          $sub_array[] = '<button type="button" name="update" id="'.$row["id"].'" class="btn btn-warning btn-xs update">Update</button>';
          $sub_array[] = '<button type="button" name="delete" id="'.$row["id"].'" class="btn btn-danger btn-xs delete">Delete</button>';
         $data[] = $sub_array;
        }
        $output = array(
         "draw"    => intval($_POST["draw"]),
         "recordsTotal"  =>  $filtered_rows,
         "recordsFiltered" => get_total_all_records(),
         "data"    => $data
        );
        echo json_encode($output);

    }
  break;

    default: {
      // do not forget to return default data, if you need it...
    }
  }


  
function upload_image()
{
 
 if(isset($_FILES["user_image"]))
 {
  $extension = explode('.', $_FILES['user_image']['name']);
  $new_name = rand() . '.' . $extension[1];
  $destination = 'userimgs/' . $new_name;
  move_uploaded_file($_FILES['user_image']['tmp_name'], $destination);
  return $new_name;
 }
}



function get_total_all_records()
{ include('db_config.php');
  $statement = $connection->prepare("SELECT * FROM patient");
  $statement->execute();
  $result = $statement->fetchAll();
  return $statement->rowCount();
}


function get_image_name($user_id)
{
  include('db_config.php');
  $statement = $connection->prepare("SELECT img FROM patient WHERE id = '$user_id'");
  $statement->execute();
  $result = $statement->fetchAll();
  foreach($result as $row)
  {
    return $row["img"];
  }
}

?>