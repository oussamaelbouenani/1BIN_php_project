<section class="container">
    <div id="notification" class="<?php echo $alert?>"><?php echo $notification; ?></div>
    <div class="border border-dark" style="background-color: #272C31; color: white; padding: 20px">
        <div>
            <form action="?action=question" method="post" style="padding: 40px">
                <div>
                    <i class="float-left btn btn-warning"><?php
                        if ($question->html_status() == 1) {
                            ?> <span class="glyphicon glyphicon-ok"></span> Résolue <?php
                        } else if ($question->html_duplicated() == 1) {
                            echo "Doublon";
                        } else {
                            echo "Ouverte";
                        }
                        ?>
                    </i>
                    <?php if ($question->html_status() == 1){ ?>
                        <input class="align-content-center btn btn-outline-warning" type="submit" name="MauvaiseReponse" value="Remettre ouverte.">
                        <input type="hidden" name="noQuestion" value="<?php echo $question->html_question_id()?>">
                        <input type="hidden" name="showQuestion[<?php echo $question->html_question_id() ?>]">
                    <?php } ?>

                    <?php if ($echoadmin){
                        echo '<button class="float-right btn btn-outline-danger" type="submit" name="deleteQuestion['.$question->html_question_id().']"><span class="glyphicon glyphicon-remove"></span> Supprimer la question</button>';
                    }
                    ?>
                    <?php if ($echoadmin && $question->html_duplicated() == 0){
                        echo '<button class="float-right btn btn-outline-info" type="submit" name="duplicateQuestion['.$question->html_question_id().']"><span class="glyphicon glyphicon-duplicate"></span> Marquer la question comme doublon.</button>';
                    } else if ($echoadmin && $question->html_duplicated() == 1) {
                        echo '<button class="float-right btn btn-outline-info" type="submit" name="duplicateQuestion[' . $question->html_question_id() . ']"><span class="glyphicon glyphicon-duplicate"></span> Retirer des doublons.</button>';
                    }
                    ?>
                </div>
            </form>
            <h1 style="background-color: #19434E; text-align: center">
                Question by <?php echo $question_user->html_pseudo();
                if ($question->html_duplicated() == 1) echo " [DOUBLON]";
                ?>
            </h1>
        </div>
        <h3 class="pt-4"> <?php echo $question->html_title(); ?> </h3>
        <br>
        <div>
            <?php if ($modifier_question){?>
                <form action="index.php?action=question" method="post">
                    <textarea class="form-control p-3" rows="10" name="new_question"><?php echo $question->html_subject(); ?></textarea>
                    <button type="submit" name="nouveau_sujet" class="btn btn-outline-info m-3" ><span class="glyphicon glyphicon-pencil"></span> Moddifier.</button>
                    <input type="hidden" name="noQuestion" value="<?php echo $question->html_question_id()?>">
                    <input type="hidden" name="showQuestion[<?php echo $question->html_question_id() ?>]">
                </form>
            <?php } else { ?>
                <p class="pl-4"> <?php echo nl2br($question->html_subject()); ?></p>
            <?php } ?>
            <div class="row p-3">
                <div class="col-8" style = "border-top-style: solid; border-width: 1px; padding-left: 10px">
                    <?php echo $question_user->html_first_name() . ' ' . $question_user->html_last_name() . '</br>' . $question_user->html_email(); ?>
                </div>
                <div class="col-4" style="border-top-style: solid; border-width: 1px; padding-right: 10px">
                    <?php if (isset($_SESSION['utilisateur_id']) && $question_user->html_user_id() == $_SESSION['utilisateur_id'] && !$modifier_question && $question->html_status() != 1 && $question->html_duplicated() == 0){ ?>
                        <form action="index.php?action=question" method="post">
                            <button type="submit" name="update_question" class="btn btn-outline-info"><span class="glyphicon glyphicon-pencil"></span> Moddifier la quesiton</button>
                            <input type="hidden" name="noQuestion" value="<?php echo $question->html_question_id()?>">
                            <input type="hidden" name="showQuestion[<?php echo $question->html_question_id() ?>]">
                        </form>
                        <?php } ?>
                </div>
            </div>
        </div>
    </div>

    <!--Affichage des réponses-->
    <?php for ($i = 0; $i < count($question_answers); $i++) { ?>
        <div class="border border-dark rounded answer row col-12 center ml-1" style="background-color: #272C31; color: white; padding: 30px">

            <div class="row col-12 p-5">
                <div class="col-8"><?php echo nl2br($question_answers[$i]->html_subject()); ?></div>
                <div class="col-4">
                    <form method="post" action="index.php?action=question">
                        <div class="col-9" id="votes">
                            <p>
                                <?php echo "Votes favorables : " . $votes_positifs[$i]; ?>
                                <!--<input class="btn btn-outline-success " type="submit" name="vote_positif" value="+1">-->
                                <?php if ($question->html_duplicated() == 0){ ?>
                                    <button class="btn btn-outline-success" type="submit" name="vote_positif" value="+1"><i class="glyphicon glyphicon-thumbs-up"></i></button>
                                <?php }
                                ?>
                            </p>
                            <p>
                                <?php echo "Votes défavorables : " . $votes_negatifs[$i]; ?>
                                <!--<input class="btn btn-outline-danger" type="submit" name="vote_negatif" value="-1">-->
                                <?php if ($question->html_duplicated() == 0){ ?>
                                    <button class="btn btn-outline-danger" type="submit" name="vote_negatif" value="-1"><i class="glyphicon glyphicon-thumbs-down"></i></button>
                                <?php }
                                ?>
                            </p>
                        </div>
                        <div>
                            <input type="hidden" name="noQuestion" value="<?php echo $question->html_question_id()?>">
                            <input type="hidden" name="showQuestion[<?php echo $question->html_question_id() ?>]">
                            <input type="hidden" name="noAnswer" value="<?php echo $question_answers[$i]->html_answer_id() ?>">
                        </div>

                    </form></div>
            </div>
            <div class="p-3 m-1 row col-12" style = "border-top-style: solid; border-width: 1px; padding: 10px;" >
                <div class="p-4 col-8">
                    <?php echo $answer_user[$i]->html_first_name() . ' ' . $answer_user[$i]->html_last_name() . '</br>' . $answer_user[$i]->html_email(); ?>
                </div>
                <?php if (!empty($_SESSION['utilisateur_id']) && $question_user->html_user_id() == $_SESSION['utilisateur_id']){ ?>
                    <div class="p-4 col-4">
                        <form action="index.php?action=question" method="post">
                            <?php
                            if ($question->html_status() == 0 && $question->html_duplicated() == 0){ ?>
                                <button class="btn btn-outline-info" type="submit" name="BonneReponse"><span class="glyphicon glyphicon-ok-sign"></span> Bonne réponse</button>
                            <?php } ?>
                            <input type="hidden" name="noQuestion" value="<?php echo $question->html_question_id()?>">
                            <input type="hidden" name="showQuestion[<?php echo $question->html_question_id() ?>]">
                            <input type="hidden" name="noAnswer" value="<?php echo $question_answers[$i]->html_answer_id() ?>">
                        </form>
                    </div>
                <?php } ?>
            </div>
        </div>
    <?php } ?>

    <!-- Possible bordel à partire d'ici juste ajouté un controller new answer.-->
    <?php if ($question->html_duplicated() != 1 && $question->html_status() != 1) {?>
        <form action="?action=question" method="post">
            <p>
                <textarea style="width: 80%; margin: 30px; height: 150px" name="answer" placeholder="Entrez votre réponse :"></textarea>
            </p>
            <input type="submit" class="btn btn-primary" name="answerQuestion" style="margin-left: 30px" value="Répondre">
            <input type="hidden" name="noQuestion" value="<?php echo $question->html_question_id()?>">
            <input type="hidden" name="showQuestion[<?php echo $question->html_question_id() ?>]">
        </form>
    <?php } ?>


</section>