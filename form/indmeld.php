<?php 

// vi skal ikke bruger header, men WP's funktionsbibliotek
define('WP_USE_THEMES', false); 

// Vores retur encodes til json, så det er nemt at bruge i javascript.
header('Cache-Control: no-cache, must-revalidate');
header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
header('Content-Type: application/json');

// Hent wp-load, så vi får mulighed for at bruge wordpress' funktionsarkiv
require '../../../../wp-load.php';


// Klargør response array til senere json_encode();
$response = array();


$data = $_POST['data'];
$keys = $data['keys'];
$values = $data['values'];



$content = '<h4>Ny indmeldelse</h4>';

$i = 0; $check = ''; $kidcount = -1;
while($i < 55){

    $check = ($i == 0) ? null : '-'.$i;
    $i++;
    
    if(isset($keys['kname'.$check])){
        $kidcount ++;
        $content .= '<p><strong>Barn '.$i.'</strong></p>';
        $content .= '<ul>';
            $content .= '<li>'.$keys['kname'.$check].': '.$values['kname'.$check].'</li>';
            $content .= '<li>'.$keys['cpr'.$check].': '.$values['cpr'.$check].'</li>';
            $content .= '<li>'.$keys['last-school'.$check].': '.$values['last-school'.$check].'</li>';
        $content .= '</ul>';
    
    }
}


$i = 0; $check = '';
while($i < 55){

    $check = ($i == 0) ? null : '-'.$i;
    $i++;
    
    if(isset($keys['pname'.$check])){
        $content .= '<p><strong>Voksen '.$i.'</strong></p>';
        $content .= '<ul>';
            $content .= '<li>'.$keys['pname'.$check].': '.$values['pname'.$check].'</li>';
        if(!empty($values['email'.$check])){$content .= '<li>'.$keys['email'.$check].': '.$values['email'.$check].'</li>';}
        if(!empty($values['telefon'.$check])){$content .= '<li>'.$keys['telefon'.$check].': '.$values['telefon'.$check].'</li>';}
        if(!empty($values['vej'.$check])){
            $content .= '<li>'.$keys['vej'.$check].': '.$values['vej'.$check].'</li>';
            $content .= '<li>'.$keys['house_nr'.$check].': '.$values['house_nr'.$check].' '.$values['house_floor'.$check].'</li>';
            $content .= '<li>'.$keys['post'.$check].': '.$values['post'.$check].'</li>';
            $content .= '<li>'.$keys['by'.$check].': '.$values['by'.$check].'</li>';
        }
        $content .= '</ul>';
    }
}


$title = 'Ny inmeldelse '.date_i18n('Y-m-d H.i').' : '.$values['kname'];
if($kidcount > 0){
$title .= ' +'.$kidcount;
}

$new = wp_insert_post(array(
    'post_content'   => $content,
    'post_title'     =>  $title,
    'post_status'    => 'publish',
    'post_type'      => 'indmeldelse',
),true);

if(is_wp_error($new)){
    
    $response['error'] = 'Fejl ved oprettelse af backup post';
    echo json_encode($response);
    exit;

}

$response['success_msg'] = 'Tak for din henvendelse. Du vil blive kontaktet snarest!';

echo json_encode($response);
exit;

?>