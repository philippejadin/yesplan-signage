<!doctype html>
<html lang="en">
<!--
Debug output : 

<?php //echo print_r($events); 
?>

-->


<head>
    <meta charset="utf-8">

    <title></title>

    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/reveal.js/5.1.0/reveal.min.css"
        integrity="sha512-0AUO8B5ll9y1ERV/55xq3HeccBGnvAJQsVGitNac/iQCLyDTGLUBMPqlupIWp/rJg0hV3WWHusXchEIdqFAv1Q=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/reveal.js/5.1.0/theme/black.min.css"
        integrity="sha512-B1sAcZ4KSpvbIUUvxaoqy56z88d6fozQyEV54K0gVBUMDMcVu9CAXMwJ5wTWo650j3IQH6yDEETiek6lrk/zCw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <style>
        /* 
        https://blog.corsego.com/css-readability-tricks
        https://css-tricks.com/design-considerations-text-images/
        */

        /*
        .stroke {
            -webkit-text-stroke-width: 1px;
            -webkit-text-stroke-color: black;
            text-shadow: -2px 2px 0 #000,
                2px 2px 0 #000,
                2px -2px 0 #000,
                -2px -2px 0 #000;
        }

        .title {
            background-color: white;
            color: black;
            padding: 1rem 0.1rem;
            padding-top: 10px;
            padding-right: 50px;
            padding-bottom: 50px;
            padding-left: 10px;
        }


        .meta {
            display: inline-block;
            background-color: white;
            color: black;
            padding: 10px;
            margin: 10px;
            text-align: left;
        }
        */


        .container {
            display: grid;
            grid-auto-flow: column;
            grid-auto-columns: 1fr;
        }


        /**
        .section {
            display: flex;
            flex-direction: row;
        }

        .info {
            width: 70%;
            height: 100vh;
            background-color: green;
            text-align: center;
            color: white;
        }

        .photo {
            width: 30%;
            padding: 30px;
            height: 100vh;
            border: green solid 5px;
            margin: 50px;
        }

        .photo {
            max-width: 100%;
        }*/

        .photo {
            max-width: 100%;
            border-radius: 1rem;
        }
    </style>

</head>

<body>

    <div class="reveal">

        <div class="slides">

            <?php foreach ($events as $event): ?>
                <section>


                    <div class="container">



                        <div class="col">
                            <h2>
                                <?php echo $event['name'] ?>
                            </h2>

                            <?php if (isset($event['locations'][0]['name'])): ?>
                                <div>
                                    <strong>
                                        <?php echo $event['locations'][0]['name']; ?>
                                    </strong>
                                </div>
                            <?php endif; ?>

                            <?php
                            $starttime = new DateTimeImmutable($event['starttime']);
                            $endtime = new DateTimeImmutable($event['endtime']);
                            ?>

                            <div>
                                <?php echo $starttime->format('d/m'); ?>
                            </div>


                            <div>
                                <?php echo $starttime->format('G:i'); ?>
                                <?php if ($starttime->format('G:i') <> $endtime->format('G:i')): ?>
                                    &rarr; <?php echo $endtime->format('G:i'); ?>
                                <?php endif; ?>
                            </div>

                        </div>




                        <?php if (isset($event['photo'])): ?>
                            <div class="col">
                                <img class="photo" src="<?php echo $event['photo'] ?>" />
                            </div>
                        <?php endif; ?>




                    </div>
                </section>
            <?php endforeach; ?>
        </div>
    </div>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/reveal.js/5.1.0/reveal.js"
        integrity="sha512-35L3EFHQcGaTZ6QN9wAg9iK1hTPVCn8RGsscuXjm5JdmDRyOw+/IWJ4wavGkozQ8VDoddD7nV1psHgu/BYNpxQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        Reveal.initialize({
            autoSlide: 10000,
            loop: true
            //autoSlideStoppable: false
        });
    </script>

</body>

</html>