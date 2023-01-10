
<?php
include "config/config.php";
$jobs=array();
$sql = "SELECT `id`, `title`, `hangout`, `email`, `skype`, `city`, `state`, `country`, `description`, `rating`, `verified`, `availability`, `experience`, `age_min`, `age_max`, `skills`, `company`, `education`, `language`, `photo`, `date_start`, `date_end`, `category`, `compensation`, `address`, `makaryoid` FROM `makaryo_job` LIMIT 8";
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $jobs[$i]['id']=$row['id'];
            $jobs[$i]['title']=$row['title'];
            $jobs[$i]['hangout']=$row['hangout'];
            $jobs[$i]['email']=$row['email'];
            $jobs[$i]['skype']=$row['skype'];
            $jobs[$i]['city']=$row['city'];
            $jobs[$i]['state']=$row['state'];
            $jobs[$i]['country']=$row['country'];
            $jobs[$i]['description']=$row['description'];
            $jobs[$i]['rating']=$row['rating'];
            $jobs[$i]['verified']=$row['verified'];
            $jobs[$i]['availability']=$row['availability'];
            $jobs[$i]['experience']=$row['experience'];
            $jobs[$i]['age_min']=$row['age_min'];
            $jobs[$i]['age_max']=$row['age_max'];
            $jobs[$i]['skills']=explode(",",$row['skills']);
            $jobs[$i]['photo'] = 'data:image/jpeg;base64,'.base64_encode($row['photo']).' ';
            $jobs[$i]['company']=$row['company'];
            $jobs[$i]['education']=$row['education'];
            $jobs[$i]['language']=$row['language'];
            $jobs[$i]['date_start']=date('m/d/Y', strtotime($row['date_start']));
            $jobs[$i]['date_end']=date('m/d/Y', strtotime($row['date_end']));
            $jobs[$i]['category']=$row['category'];
            $jobs[$i]['compensation']=$row['compensation'];
            $jobs[$i]['address']=$row['address'];
            $i++;
        }
    }

    print_r($jobs);

    ?>