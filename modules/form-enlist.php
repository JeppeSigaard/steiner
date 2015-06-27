<form method="post" action="<?php echo get_template_directory_uri(); ?>/form/indmeld.php">
   
    <div>
        <h4>Indmeldelse af elev</h4>
    </div>
    
    <div class="clone" data-clone="kid" data-clone-v="0">
        <div>
            <label for="kname">Elevens fulde navn</label>
            <input type="text" name="kname" required>   
        </div>
        <div>
            <label for="cpr">CPR-nummer</label>
            <input type="text" name="cpr" required>   
        </div>

         <div>
            <label for="last-school">Tidligere skole</label>
            <input type="text" name="last-school" required>   
        </div>
        <div class="buttonset hidden" data-clone="kid" data-clone-v="0">
            <a class="button red small clone-remove">slet</a>
        </div>
    </div>
    <div class="buttonset" data-clone="kid" data-clone-v="0">
        <a href="#" class="button black small clone-add">+ Tilføj elev</a>
    </div>
    
    <div><br/></div>
    
    <div>
        <h4>Kontakt til forældre</h4>
    </div>
    
    <div class="clone" data-clone="parent" data-clone-v="0">
        <div>
            <label for="pname">Voksens fulde navn</label>
            <input type="text" name="pname" required>   
        </div>
        
        <div>
            <label for="email">Email</label>
            <input type="email" name="email" required/>
        </div>
        
        <div>
            <label for="telefon">Telefonnummer</label>
            <input type="tel" name="telefon" required/>
        </div>
        
        <div class="split clone-hide">
            <div>
                <label for="vej">Vejnavn</label>
                <input type="text" name="vej">
            </div>
            <div class="small">
                <label for="house_nr">Husnummer</label>
                <input type="text" name="house_nr">   
            </div>
            <div class="small">
                <label for="house_floor">Bogstav / etage</label>
                <input type="text" name="house_floor">   
            </div>
        </div>
        <div class="split clone-hide">
            <div class="small">
                <label for="post">Postnummer</label>
                <input type="text" name="post">
            </div>
            <div class="large">
                <label for="by">By</label>
                <input type="text" name="by">   
            </div>
        </div>
        <div class="buttonset hidden" data-clone="parent" data-clone-v="0">
            <a class="button red small clone-remove">slet</a>
            <a class="button black small clone-show-hidden">Tilføj en anden adresse</a>
        </div>
    </div>
    <div class="buttonset" data-clone="parent" data-clone-v="0">
        <a href="#" class="button black small clone-add" >+ Tilføj voksen</a>
    </div>
    <div><br/></div>
    <div>
        <input type="submit" class="block" value="send">
    </div>
    
</form>