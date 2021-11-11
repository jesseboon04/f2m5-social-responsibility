<ul>
    <li>
        <a href="<?php echo url( 'home' ) ?>"<?php if ( current_route_is( 'home' ) ): ?> class="active"<?php endif ?>>Home</a>
    </li>
    <li>
        <a href="<?php echo url( 'forms' ) ?>"<?php if ( current_route_is( 'forms' ) ): ?> class="active"<?php endif ?>>registreren</a>
    </li>
    <li>
        <a href="<?php echo url( 'blog' ) ?>"<?php if ( current_route_is( 'blog' ) ): ?> class="active"<?php endif ?>>Blog</a>
    </li>
    <li>
        <a href="<?php echo url( 'topics' ) ?>"<?php if ( current_route_is( 'topic' ) ): ?> class="active"<?php endif ?>>topics</a>
    </li>
</ul>