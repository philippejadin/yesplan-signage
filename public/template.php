<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">

    <title>Reveal CDN example</title>

    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/reveal.js/5.1.0/reveal.min.css" integrity="sha512-0AUO8B5ll9y1ERV/55xq3HeccBGnvAJQsVGitNac/iQCLyDTGLUBMPqlupIWp/rJg0hV3WWHusXchEIdqFAv1Q==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/reveal.js/5.1.0/theme/black.min.css" integrity="sha512-B1sAcZ4KSpvbIUUvxaoqy56z88d6fozQyEV54K0gVBUMDMcVu9CAXMwJ5wTWo650j3IQH6yDEETiek6lrk/zCw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>

    <div class="reveal">

        <div class="slides">

            <?php foreach ($events as $event): ?>
                <section>
                    <h1 class="r-fit-text">
                        <?php echo $event['name'] ?>
                    </h1>

                    <?php if (isset($event['locations'][0]['name'])) : ?>
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


                    <?php echo $starttime->format('G:i'); ?>
                    <?php if ($starttime->format('G:i') <> $endtime->format('G:i')) : ?>
                        &rarr; <?php echo $endtime->format('G:i'); ?>
                    <?php endif; ?>


                </section>
            <?php endforeach; ?>
        </div>

    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/reveal.js/5.1.0/reveal.js" integrity="sha512-35L3EFHQcGaTZ6QN9wAg9iK1hTPVCn8RGsscuXjm5JdmDRyOw+/IWJ4wavGkozQ8VDoddD7nV1psHgu/BYNpxQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        Reveal.initialize({
            autoSlide: 5000,
            loop: true,
            autoSlideStoppable: false
        });
    </script>

</body>

</html>