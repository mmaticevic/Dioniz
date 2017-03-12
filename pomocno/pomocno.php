<?php  
/*
UPDATE `osoba` SET `ime` = '', `prezime` = '', `mjesto` = '' WHERE `osoba`.`id` = 1;


select * from mjesto
where naselje like '%%';

INSERT INTO vinarija (oib,naziv,adresa,mjesto,telefon,fax,mobitel,email,web,facebook,logo,ziroracun) 
		VALUES (:oib,:naziv,:adresa,:mjesto,:telefon,:fax,:mobitel,:email,:web,:facebook,:logo,:ziroracun);



      select a.id, a.oib, a.naziv, a.adresa,b.naselje, a.telefon, a.fax, a.email, a.ziroracun 
from vinarija a
inner join mjesto b on a.mjesto = b.id;

select  a.id ,b.naziv, a.sorta_vina, a.godina_berbe , a.cijena  
from vino a 
inner join vinarija b on a.vinarija = b.id
group by a.id ,b.naziv, a.sorta_vina, a.godina_berbe  , a.cijena 
order by a.id


select  a.oib, a.ime, a.prezime, a.adresa, b.naselje, a.telefon, a.mobitel, a.email
from osoba a
inner join mjesto b on a.mjesto = b.id;


select  sorta_vina as naziv, count(id) as ukupno from vino
group by  naziv;


select a.id, a.naziv, count(b.vinarija) as ukupno
                                        from vinarija a
                                        inner join vino b on a.id = b.vinarija
                                        group by a.id, a.naziv order by 3 desc limit 100


        


for ($i=4; $i < 2000; $i++) { 
	$oib = "00000000000" . $i;
	$oib=substr($oib, count($oib)-11);
	$mjesto= rand(0,5000);
	$telefon= rand(30000000,44999999);
	$mobitel= rand(98000000,98999999);
	echo "INSERT INTO `osoba` (`oib`, `ime`, `prezime`, `kupac`, `adresa`, `mjesto`, `telefon`, `mobitel`, `email`, `lozinka`, `slika`) VALUES('" . $oib . "', 'Ime', 'Prezime', null,'adresa', '" . $mjesto . "','" . $telefon . "', '" . $mobitel . "', 'email', 'd0aeeef9a9aeddbaa999b7b65101b3a1', null   );<br />";
}





for ($i=19; $i < 100; $i++) { 
	$id = " " . $i;
	$vinarija = rand(1,2);

	echo  "INSERT INTO `vino` (`id`, `vinarija`, `sorta_vina`, `godina_berbe`, `slika`, `opis`, `cijena`) VALUES('" . $id . "', '" . $vinarija . "', 'Graševina 0,75l', '2011', NULL, 'Lorem Ipsum', '200.00'); <br />";
}

