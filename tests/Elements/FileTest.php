<?php

namespace SpenserHale\Html\Test\Elements;

use SpenserHale\Html\Elements\File;
use SpenserHale\Html\Test\TestCase;

class FileTest extends TestCase
{
    /** @test */
    public function it_can_create_a_file()
    {
        $this->assertHtmlStringEqualsHtmlString(
            '<input type="file">',
            File::create()
        );
    }

    /** @test */
    public function it_can_create_an_autofocused_file()
    {
        $this->assertHtmlStringEqualsHtmlString(
            '<input type="file" autofocus>',
            File::create()->autofocus()
        );
    }

    /** @test */
    public function it_can_create_a_file_that_has_autofocus_when_passing_true()
    {
        $this->assertHtmlStringEqualsHtmlString(
            '<input type="file" autofocus>',
            File::create()->autofocus(true)
        );
    }

    /** @test */
    public function it_wont_create_a_file_that_has_autofocus_when_passing_false()
    {
        $this->assertHtmlStringEqualsHtmlString(
            '<input type="file">',
            File::create()->autofocus(false)
        );
    }

    /** @test */
    public function it_can_create_an_required_file()
    {
        $this->assertHtmlStringEqualsHtmlString(
            '<input type="file" required>',
            File::create()->required()
        );
    }

    /** @test */
    public function it_can_create_a_file_with_a_name()
    {
        $this->assertHtmlStringEqualsHtmlString(
            '<input type="file" name="file">',
            File::create()->name('file')
        );
    }

    /** @test */
    public function it_can_create_a_file_with_accept_audio()
    {
        $this->assertHtmlStringEqualsHtmlString(
            '<input type="file" accept="audio/*">',
            File::create()->accept(File::ACCEPT_AUDIO)
        );

        $this->assertHtmlStringEqualsHtmlString(
            '<input type="file" accept="audio/*">',
            File::create()->acceptAudio()
        );
    }

    /** @test */
    public function it_can_create_a_file_with_accept_video()
    {
        $this->assertHtmlStringEqualsHtmlString(
            '<input type="file" accept="video/*">',
            File::create()->accept(File::ACCEPT_VIDEO)
        );

        $this->assertHtmlStringEqualsHtmlString(
            '<input type="file" accept="video/*">',
            File::create()->acceptVideo()
        );
    }

    /** @test */
    public function it_can_create_a_file_with_accept_image()
    {
        $this->assertHtmlStringEqualsHtmlString(
            '<input type="file" accept="image/*">',
            File::create()->accept(File::ACCEPT_IMAGE)
        );

        $this->assertHtmlStringEqualsHtmlString(
            '<input type="file" accept="image/*">',
            File::create()->acceptImage()
        );
    }

    /** @test */
    public function it_can_create_a_file_with_accept()
    {
        $this->assertHtmlStringEqualsHtmlString(
            '<input type="file" accept=".jpg">',
            File::create()->accept('.jpg')
        );
    }

    /** @test */
    public function it_can_create_a_file_with_multiple()
    {
        $this->assertHtmlStringEqualsHtmlString(
            '<input type="file" multiple>',
            File::create()->multiple()
        );
    }
}
