<div class="section_Banner">
    <img class="section_Banner_Icon" src="public/imgs/banners/quests-icon.png" alt="quests-icon">
    <h1>Les Etablissement</h1>
    <p>On vous a fait une selection de nos petits préférés.</p>
</div>

<div class="section-filters-bar">
    <p>Tu cherche quelque chose de particulier ?</p>
    <div>
        <label for="bars" class="checkbox">
            <input type="checkbox" id="bars" name="bars" checked>
            bar
            <span></span>
        </label>
    </div>
    <div>
        <label for="club" class="checkbox">
            <input type="checkbox" id="club" name="club" checked>
            Club
            <span></span>
        </label>
    </div>
    <div>
        <label for="restaurant" class="checkbox">
            <input type="checkbox" id="restaurant" name="restaurant" checked>
            restaurant
            <span></span>
        </label>
    </div>
</div>

<div class="grid grid-3">
<?php foreach($etablissements as $etablissement): ?>
    <div class="etabs_Item" data-lat="<?= $etablissement->getLat(); ?>" data-lng="<?= $etablissement->getLng(); ?>" data-cat="<?= $etablissement->getCat(); ?>">
        <figure class="etabs_Item_Cover" style='background: url("<?= $etablissement->getBanner(); ?>") center center / cover no-repeat;'>
            <a href="#" class="text_Sticker"><?= $etablissement->getName(); ?></a>
        </figure>
        <p class="cat_Sticker"><?= $etablissement->getCat(); ?></p>
        <div class="etabs_Item_Info">
            <div class="etabs_Item_Badge">
                <img src="public/imgs/quest/completedq-b.png" alt="top Etab">
            </div>
            <div class="etabs_Status">
                <p>Open</p>
                <div class="etab_Open"></div>
            </div>
            <div class="etabs_Info">
                <div class="etabs_Info_1">
                    <p class="note"><?= $etablissement->getMoyenne(); ?></p>
                    <p class="nb_Vote"><?= $etablissement->getNbVote(); ?> votes</p>
                    
                </div>
                <div class="etabs_Info_2">
                    <p class="grade_Tarif" data-gradeTarif="<?= $etablissement->getGradeTarif(); ?>"><span style="color:#F1C40F">€€</span>€</p>
                </div>
                
            </div>
            <div class="etabs_Info">
                <div class="etabs_Info_1">
                    <div class="fas fa-map-marker-alt localisation"></div>
                    <div>
                        <p><?= $etablissement->getAdresse(); ?></p>
                        <p><?= $etablissement->getCode().' '.$etablissement->getCity(); ?></p>
                    </div>
                </div>
                <div class="etabs_Info_2">
                    <div class="fas fa-phone-square-alt localisation"></div>
                    <p><?= $etablissement->getPhone(); ?></p>

                </div>
            </div>
            <div class="etabs_Info etabs_Info_Text">
                <p><?= $etablissement->getDescription(); ?></p>
            </div>
        </div>
    </div>
<?php endforeach; ?>
</div>
