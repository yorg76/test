<h2>Dodaj Firmę</h2>

<?php echo form::open() ?>
<dl>          
    <dt>Nazwa:</dt>
    <dd>
        <?php echo Form::input('nazwa',(isset($_POST['nazwa']))?$_POST['nazwa']:'' ); ?>
        <span style="color:red"><?php if(isset($error['nazwa'])) echo $error['nazwa']; ?></span>
    </dd>

    <dt>NIP:</dt>
    <dd>
        <?php echo Form::input('nip',(isset($_POST['nip']))?$_POST['nip']:'');?>
        <span style="color:red"><?php if(isset($error['nip'])) echo $error['nip']; ?></span>
    </dd>

    <dt></dt>
	
	<dt>REGON:</dt>
    <dd>
        <?php echo Form::input('regon',(isset($_POST['regon']))?$_POST['regon']:'');?>
        <span style="color:red"><?php if(isset($error['regon'])) echo $error['regon']; ?></span>
    </dd>

    <dt></dt>
    <dd><?php echo Form::submit('', 'Dodaj') ?></dd>
</dl>
								
<?php echo form::close() ?>