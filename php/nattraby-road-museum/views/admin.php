<aside class="views-admin-aside">
    <nav>
        <ul>
            <?php foreach ($pages as $key => $value) : ?>
                <?php if ($key == "post-bearbetning") : ?>
                    <?php continue; ?>
                <?php endif; ?>
                <li>
                    <a href="?sida=<?= $key ?>"><?= $value["title"] ?></a>
                </li>
            <?php endforeach; ?>
        </ul>
    </nav>
</aside>

<main>
    <article>
        <?php if ($page) : ?>
            <?php include($page["file"]); ?>
        <?php else : ?>
            <p>Sidan ej funnen!</p>
        <?php endif; ?>

    </article>
</main>
