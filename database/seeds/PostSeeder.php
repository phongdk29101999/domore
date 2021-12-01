<?php
// phpcs:disable
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('posts')->insert([
            'user_id' => 1,
            'title' => "DOMORE Project",
            'content' => "# Domore - 赤黒チーム
            > チームのメンバー：
            > - ドー・キム・フォン（20176843）
            > - レ・スアン・ティン（20176880）
            > - ドー・ティー・フォン（20176780）
            > - ズオン・ヴァン・ドゥック（20176724）
            > - グエン・コック・ヴオン（20176915）(欠)
            ## Requirements
            - Docker CE
            - Nodejs & NPM
            ## Init CLI file
            ```
            cp domore-cli.example domore-cli && sudo chmod +x domore-cli
            ```
            ## Init neccessary file
            > Choose your operation system name: `ubuntu`, `macos-intel`, `macos-m1`
            ```
            ./domore-cli init:file [operation-system-name]
            ```
            ## Add static ip for macos
            > Everytime macos restart, run `./domore-cli init:ip` again.
            ```
            ./domore-cli init:ip
            ```
            ## Build && Run docker
            ```
            docker-compose build && docker-compose up -d
            ```
            ## Load environment file
            ```
            ./domore-cli load:env
            ```
            ## Load hostsname
            ```
            ./domore-cli load:host
            ```
            ## Load package
            ```
            ./domore-cli load:package
            ```
            ## Migration & Seed
            ```
            docker-compose exec app php artisan migrate && docker-compose exec app php artisan db:seed --class=DatabaseSeeder
            ```
            ## Domore local: [http://domore.test.com](http://domore.test.com)
                          ",
            'description' => "DOMORE - A platform to share everybody's knowledge.",
            'date_create' => date('Y-m-d H:i:s'),
        ]);
        DB::table('posts')->insert([
            'user_id' => 2,
            'title' => "Laravel",
            'content' => "
                    ## About Laravel
                    ![](https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg)

                    Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

                    - [Simple, fast routing engine](https://laravel.com/docs/routing).
                    - [Powerful dependency injection container](https://laravel.com/docs/container).
                    - Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
                    - Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
                    - Database agnostic [schema migrations](https://laravel.com/docs/migrations).
                    - [Robust background job processing](https://laravel.com/docs/queues).
                    - [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

                    Laravel is accessible, powerful, and provides tools required for large, robust applications.

                    ## Learning Laravel

                    Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework.

                    If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains over 1500 video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

                    ## Laravel Sponsors

                    We would like to extend our thanks to the following sponsors for funding Laravel development. If you are interested in becoming a sponsor, please visit the Laravel [Patreon page](https://patreon.com/taylorotwell).

                    ### Premium Partners

                    - **[Vehikl](https://vehikl.com/)**
                    - **[Tighten Co.](https://tighten.co)**
                    - **[Kirschbaum Development Group](https://kirschbaumdevelopment.com)**
                    - **[64 Robots](https://64robots.com)**
                    - **[Cubet Techno Labs](https://cubettech.com)**
                    - **[Cyber-Duck](https://cyber-duck.co.uk)**
                    - **[Many](https://www.many.co.uk)**
                    - **[Webdock, Fast VPS Hosting](https://www.webdock.io/en)**
                    - **[DevSquad](https://devsquad.com)**
                    - **[Curotec](https://www.curotec.com/)**
                    - **[OP.GG](https://op.gg)**

                    ## Contributing

                    Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

                    ## Code of Conduct

                    In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

                    ## Security Vulnerabilities

                    If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

                    ## License

                    The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
                    ",
            'description' => "Laravel is a web application framework with expressive, elegant syntax",
            'date_create' => date('Y-m-d H:i:s'),
        ]);
        DB::table('posts')->insert([
            'user_id' => 1,
            'title' => "Markdown-IT",
            'content' => '---
            __Advertisement :)__

            - __[pica](https://nodeca.github.io/pica/demo/)__ - high quality and fast image
              resize in browser.
            - __[babelfish](https://github.com/nodeca/babelfish/)__ - developer friendly
              i18n with plurals support and easy syntax.

            You will like those projects!

            ---

            # h1 Heading 8-)
            ## h2 Heading
            ### h3 Heading
            #### h4 Heading
            ##### h5 Heading
            ###### h6 Heading


            ## Horizontal Rules

            ___

            ---

            ***


            ## Typographic replacements

            Enable typographer option to see result.

            (c) (C) (r) (R) (tm) (TM) (p) (P) +-

            test.. test... test..... test?..... test!....

            !!!!!! ???? ,,  -- ---

            "Smartypants, double quotes" and single quotes


            ## Emphasis

            **This is bold text**

            __This is bold text__

            *This is italic text*

            _This is italic text_

            ~~Strikethrough~~


            ## Blockquotes


            > Blockquotes can also be nested...
            >> ...by using additional greater-than signs right next to each other...
            > > > ...or with spaces between arrows.


            ## Lists

            Unordered

            + Create a list by starting a line with `+`, `-`, or `*`
            + Sub-lists are made by indenting 2 spaces:
              - Marker character change forces new list start:
                * Ac tristique libero volutpat at
                + Facilisis in pretium nisl aliquet
                - Nulla volutpat aliquam velit
            + Very easy!

            Ordered

            1. Lorem ipsum dolor sit amet
            2. Consectetur adipiscing elit
            3. Integer molestie lorem at massa


            1. You can use sequential numbers...
            1. ...or keep all the numbers as `1.`

            Start numbering with offset:

            57. foo
            1. bar


            ## Code

            Inline `code`

            Indented code

                // Some comments
                line 1 of code
                line 2 of code
                line 3 of code


            Block code "fences"

            ```
            Sample text here...
            ```

            Syntax highlighting

            ``` js
            var foo = function (bar) {
              return bar++;
            };

            console.log(foo(5));
            ```

            ## Tables

            | Option | Description |
            | ------ | ----------- |
            | data   | path to data files to supply the data that will be passed into templates. |
            | engine | engine to be used for processing templates. Handlebars is the default. |
            | ext    | extension to be used for dest files. |

            Right aligned columns

            | Option | Description |
            | ------:| -----------:|
            | data   | path to data files to supply the data that will be passed into templates. |
            | engine | engine to be used for processing templates. Handlebars is the default. |
            | ext    | extension to be used for dest files. |


            ## Links

            [link text](http://dev.nodeca.com)

            [link with title](http://nodeca.github.io/pica/demo/ "title text!")

            Autoconverted link https://github.com/nodeca/pica (enable linkify to see)


            ## Images

            ![Minion](https://octodex.github.com/images/minion.png)
            ![Stormtroopocat](https://octodex.github.com/images/stormtroopocat.jpg "The Stormtroopocat")

            Like links, Images also have a footnote style syntax

            ![Alt text][id]

            With a reference later in the document defining the URL location:

            [id]: https://octodex.github.com/images/dojocat.jpg  "The Dojocat"


            ## Plugins

            The killer feature of `markdown-it` is very effective support of
            [syntax plugins](https://www.npmjs.org/browse/keyword/markdown-it-plugin).


            ### [Emojies](https://github.com/markdown-it/markdown-it-emoji)

            > Classic markup: :wink: :crush: :cry: :tear: :laughing: :yum:
            >
            > Shortcuts (emoticons): :-) :-( 8-) ;)

            see [how to change output](https://github.com/markdown-it/markdown-it-emoji#change-output) with twemoji.


            ### [Subscript](https://github.com/markdown-it/markdown-it-sub) / [Superscript](https://github.com/markdown-it/markdown-it-sup)

            - 19^th^
            - H~2~O


            ### [\<ins>](https://github.com/markdown-it/markdown-it-ins)

            ++Inserted text++


            ### [\<mark>](https://github.com/markdown-it/markdown-it-mark)

            ==Marked text==


            ### [Footnotes](https://github.com/markdown-it/markdown-it-footnote)

            Footnote 1 link[^first].

            Footnote 2 link[^second].

            Inline footnote^[Text of inline footnote] definition.

            Duplicated footnote reference[^second].

            [^first]: Footnote **can have markup**

                and multiple paragraphs.

            [^second]: Footnote text.


            ### [Definition lists](https://github.com/markdown-it/markdown-it-deflist)

            Term 1

            :   Definition 1
            with lazy continuation.

            Term 2 with *inline markup*

            :   Definition 2

                    { some code, part of Definition 2 }

                Third paragraph of definition 2.

            _Compact style:_

            Term 1
              ~ Definition 1

            Term 2
              ~ Definition 2a
              ~ Definition 2b


            ### [Abbreviations](https://github.com/markdown-it/markdown-it-abbr)

            This is HTML abbreviation example.

            It converts "HTML", but keep intact partial entries like "xxxHTMLyyy" and so on.

            *[HTML]: Hyper Text Markup Language

            ### [Custom containers](https://github.com/markdown-it/markdown-it-container)

            ::: warning
            *here be dragons*
            :::
            ',
            'description' => "Some rule and example when using markdown.",
            'date_create' => date('Y-m-d H:i:s'),
        ]);
    }
}
