<!doctype html>
<html lang="en">
<!--
Debug output : 

<?php // echo print_r($events);
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
        https://www.joomlashack.com/blog/tutorials/center-and-align-items-in-css-grid/
        */

        .container {
            display: grid;
            grid-auto-flow: column;
            grid-auto-columns: 1fr;
            align-items: center;
            justify-items: center;
            grid-gap: 2rem;
        }

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

                <?php if ($event['show']): ?>
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
                               

                                <div>
                                    <?php echo $event['start']->format('d/m'); ?>
                                </div>

                                <div>
                                    <?php echo $event['start']->format('G:i'); ?>
                                    <?php if ($event['start']->format('G:i') <> $event['end']->format('G:i')): ?>
                                        &rarr; <?php echo $event['end']->format('G:i'); ?>
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
                <?php endif; ?>
            <?php endforeach; ?>
        </div>
    </div>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/reveal.js/5.1.0/reveal.js"
        integrity="sha512-35L3EFHQcGaTZ6QN9wAg9iK1hTPVCn8RGsscuXjm5JdmDRyOw+/IWJ4wavGkozQ8VDoddD7nV1psHgu/BYNpxQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        Reveal.initialize({
            autoSlide: 10000,
            loop: true,
            progress: true,
            history: true,
            //transition: 'concave'
            //autoSlideStoppable: false
        });
    </script>

</body>

</html>