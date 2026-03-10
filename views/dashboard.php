<?php
use App\Cat;
use App\Dog;

?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
  </head>
  <body>
    <h1>Petshelter manage</h1>
    <div class="container">
        <form class="row g-3" method="POST">
            <div class="col-2">
                <input type="text" class="form-control" id="fName" name="fName" placeholder="Name">
            </div> 
            <div class="col-1">
                <input type="text" class="form-control" id="fType" name="fType" placeholder="Type">
            </div>
            <div class="col-1">
                <input type="text" class="form-control" id="fAge" name="fAge" placeholder="Age">
            </div>
            <div class="col-2">
                <input type="text" class="form-control" id="fGender" name="fGender" placeholder="Gender">
            </div> 
            <div class="col-2">
                <input type="text" class="form-control" id="fStav" name="fStatus" placeholder="adopt/at home">
            </div>
            <div class="col-2">
                <input type="text" class="form-control" id="fSpecParam" name="fSpecParam" placeholder="<?php ?>breed/outdoor">
            </div>

            <div class="col-2">
                <button type="submit" class="btn btn-primary" name="addPet" value="addPet">Add PET</button>
            </div>
        </form><br>


        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    
                    <th scope="col">Name</th>
                    <th scope="col">Age</th>
                    <th scope="col">Gender</th>
                    <th scope="col">Status</th>
                    <th scope="col">Spec_param</th>
                   
                </tr>
            </thead>
            <tbody>
                <?php foreach($animals as $animal): ?>
                    <tr>
                        <td><?= $animal->getName(); ?></td>
                        <td><?= $animal->getAge(); ?></td>
                        <td><?= $animal->getGender(); ?></td>
                        <td>
                            <?php if($animal->getIsAdopted()):  ?>
                                 <form method="POST">
                                    <input type="hidden" name="animal_id" value="<?= $animal->getId(); ?>">
                                    <input type="submit" name="adopt" class="btn btn-sm btn-outline-danger" value="adopt">
                                </form>
                                
                            <?php else: ?>
                               <span class="badge bg-success">at home</span>
                            <?php endif; ?>
                        </td>


                        <td><?php 
                            if($animal instanceof Dog){
                                echo $animal->getBreed(); 
                            }elseif($animal instanceof Cat){
                                echo $animal->getIsOutdoor() ? "outdoor" : "indoor";
                            }
                            ?>
                        </td>
                    </tr>
                <?php endforeach; ?>        
            </tbody>
        </table>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
  </body>
</html>