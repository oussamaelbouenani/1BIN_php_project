<section class="container">
    <fieldset>
        <legend>Votre Question :</legend>
        <div class="form-group">
            <form method="post" action="index.php?action=newQuestion">
                <p>Titre : <input type="text" name="title"></p>
                <p>Categorie :
                    <select class="form-control" name="category">
                        <option value="1">General</option>
                        <option value="2">Algorithms</option>
                        <option value="3">AI</option>
                        <option value="4">Big Data</option>
                        <option value="5">3D Graphics</option>
                        <option value="6">Web</option>
                    </select>
                </p>
                <div class="form-group">
                    <label for="subject">Votre question</label>
                    <textarea class="form-control"  name="subject" rows="15"></textarea>
                </div>
                <input type="submit" class="btn btn-primary" value="envoyer">
            </form>
        </div>
</section>