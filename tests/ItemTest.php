<?php

namespace tests;

use RuntimeException;
use PHPUnit\Framework\TestCase;
use entities\Item;

require 'entities/Item.php';

class ItemTest extends TestCase
{
    public function testIsValidItem(): void
    {
        $item = new Item(
            'test',
            'test',
            new \DateTime('now'),
        );
        $this->assertTrue($item->isValidItem());
    }

    public function testIsNotValidName(): void
    {
        $this->expectException(RuntimeException::class);

        $item = new Item(
            ' ',
            'test',
            new \DateTime('now'),
        );
        $item->isValidItem();
    }

    public function testIsNotValidContentLength(): void
    {
        $this->expectException(RuntimeException::class);

        $item = new Item(
            'test',
            '9lGLal3vCTgatGeiIkG78IJoJC4wJ57Pa9T8ogWB0Oy1jAjNmhuqhzYBYfRJ6UvI1EL0DHb3oEHz9diIdbgCKrwY0W0VyFu9KIqzqgla
            h2NHLvJKtbFqVsfiJzwCWACLe5yYavVAkTCGjTSdmKAlfDYCL988Hf76No7brHjdtwMwv8ms4Z6rzAAK7mokjsRTqrtskpvyDEKI3jWKtT9Xzo9sRs
            giXBvVX6V6sE3uChN9FPT0Jwo6rBSp07lNqghmFVC0lbnnPneXCqWROqSNg1UFs90AUxFhA4tztymid5nAqe7ptZVZV2m6NwFAUXfN9Dmv7HwppEq
            x7UCyZTPN0vZrp8MZtclGt1PFnNlspDFEleAtICIMdMdH9I84b6VDNKSYrrJD86rGdFMKN3BthslPrizBPJcM9Xk0xbv4pTxSnNjib3lfge5VwZwa
            rw33V6QU0WpW1bPlocw4ARRGX95EyKaFWXgxgVHd9vTAg8aLI3yOn1GSeqaI7ATmP5IQBIKbfT7FPtLc9TmCrMqV8BQOdSeT51XzSp40S4S2WhFPx
            fLZ32xsdeSAI2pcvucz4xbizqv8qzMAv3Hy3MpHJzkofq8GTfbLGPldWiOs7tHzxcIjVB6gYLP2HTN2ZtIpDs39XTJReTLVA9yZtCp8ICfC8xc3k56
            MhqaMnWcIyyUiyofAX7jRCADLSBv5hmUo9J14jgU5ys0dHDQTdZRVbQ5Gq2Vho851Cpqxk1dUQSjiQHjTMcmyBp9hQ1ceecUYMRUzYjci5gQomMNAv
            0ThUwou3qkpW14BnHeCPUiLCTky6M7XtE8fQ3cg6Fr15sY9iKjB1RHUmeFm6Ib8Zh5VDRRGRFL1GQxs8dhuLZO6G6k470pAuvDv03H8lYk4DWTH9Bf
            4jhBUmxRRvfsb5fWePGozr0U5GeVLIH81JVkHhdMwpis5aIMggMkQOnoQH18YuuMfiDLQ99qY49q0M6nZf2Ys9zX4DGb7POfzJfHvUfmVc0N54dWOHQ
            K8sTWVupiGDrZzAuI9etQDswaAUUuiInoQ4VQid4rTWnfpBojFvxV9R2OcqSnxgmtuHVnCJWPwWTfZYTpD384nq3tOj2RjnnFuKnNQgOWDNFD5Ipf2
            OkMjHcAbb8ERQ9fIAmyTRB7W72hVB4LfzLW6AEdTvW9JXUiXHRHbz2H0oEmI77XCaQ0cS4ga',
            new \DateTime('now'),
        );
        $item->isValidItem();
    }

    public function testIsNotValidCreatedAt(): void
    {
        $this->expectException(RuntimeException::class);

        $item = new Item(
            'test',
            'test',
            new \DateTime('tomorrow'),
        );
        $item->isValidItem();
    }
}