<?php

  if($Posts){
  
  //translate
		if ($this->session->userdata('site_lang')=="english"): 
		$b_judul = $Posts->judul_english; 
		$b_isi = $Posts->isi_english;
		$tgl = "Date : ";
		$wb = "Write By : ";
		$rd = "Read : ";
		$kat = "Category  : ";
		$ktg=$kategori->kategori_english;
		else : 
		$b_judul = $Posts->judul; 
		$b_isi = $Posts->isi;
		$tgl = "Tanggal Posting : ";
		$wb = "Penulis : ";
		$rd = "Dibaca : ";
		$kat = "Kategori  : ";
		$ktg=$kategori->kategori;
		endif;
  

?>


<h1><?php echo $b_judul;?></h1>
<p class="lead">
                    <?php echo $wb; ?> <?php echo $Posts->author;?>
                </p>
<hr />
<p><span class="glyphicon glyphicon-time"></span> 
<?php echo $tgl; ?><?php echo  date("d M Y H:i", strtotime($Posts->created_on));?>  Wib 
| <?php echo $rd; ?> <?php echo $Posts->baca;?> |
<?php echo $kat; ?> <a href="<?php echo site_url("post/".$kategori->id."-".url_title(strtolower($ktg),'dash'));?>"><?php echo $ktg;?></a> 
		
</p>
<hr />

				  
<?php 
if($Posts->set_img=="thumb" && $Posts->set_img!="none" ):
echo ($Posts->image_data!="" && $Posts->image_data!="noimage.png")?img(array($path_image.$Posts->image_data,"style"=>"margin:0px 10px 10px 0px;","class"=>"pull-left img-thumbnail thumbnail")):''; 
endif; 

if($Posts->set_img=="full" && $Posts->set_img!="none" ):
echo ($Posts->image_data!="" && $Posts->image_data!="noimage.png")?img(array($path_image.$Posts->image_data,"style"=>"margin-bottom:20px;max-width:848px;","class"=>"img-thumbnail thumbnail")):''; 
echo ($Posts->image_data_desc!="")?'<p class="text-center">Keterangan Foto : '.$Posts->image_data_desc.'</p>':"";
endif;
?>


<?php 
#isi text
echo ($Posts->isi!="")?$b_isi:$Posts->slug_judul;
?>
        

<div style="clear:both"></div>

<!-- 
UNTUK POSTINGAN TERKAIT
-->
<?php if($terkait): ?>
<br />
<h1><i class="icon-th-list"></i> <?php echo lang('post_related');?><hr /></h1>
<div class="media-list">
<?php foreach($terkait as $row_terkait){
//translate
		if ($this->session->userdata('site_lang')=="english"): 
		$b_judul1 = $row_terkait->judul_english; 
		$b_slug_judul = $row_terkait->slug_judul_english;
		$tgl1 = "Date : ";
		$selengkapnya = "Read more...";
		else : 
		$b_judul1 = $row_terkait->judul; 
		$b_slug_judul = $row_terkait->slug_judul;
		$tgl1 = "Tanggal : ";
		$selengkapnya = "Selengkapnya..";
		endif;

 ?>
<div class="media">

<h4 class="media-heading">
<a href="<?php echo site_url('blog/'.$row_terkait->id.'-'.url_title($b_judul1, 'dash'));?>">
<?php echo $b_judul1;?></a>
</h4>


<p> <span class="glyphicon glyphicon-time"></span>
<?php echo $tgl1; ?>  

<?php echo date("d M Y H:i:s", strtotime($row_terkait->created_on));?> Wib<br />
</p>

<!--  untuk image -->
<a class="pull-left" href="<?php echo site_url('blog/'.$row_terkait->id.'-'.url_title($b_judul1, 'dash'));?>">
<?php 
$img=explode(".",$row_terkait->image_data);
echo ($row_terkait->image_data!="" && $row_terkait->image_data!="noimage.png")?img(array($path_image.image_thumb($row_terkait->image_data),"class"=>"place-left margin10 nlm ntm size3","style"=>"height:130px")):''; ?>
</a>
<div class="media-body">

<p style="text-align:justify">
<?php echo $b_slug_judul;?>
<p>

</div>

<div style="clear:both"></div>
 <hr />

</div>     
<br style="clear:both" />                                 
<?php } ?>
</div>
<?php endif; ?>
 

 
<?php 
#jika ada komentar
  if($Posts->flag_comments == 1 ):
	  echo modules::run('post/comments/index');
  endif;
?>
           	
      
<?php
}else{
  echo '<p> '.lang('post_msgnoposting').'</p>';  
}
?> 




 