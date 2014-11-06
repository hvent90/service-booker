<?php

use \MyApp\Advisor;
use \MyApp\Expertise;

class AdvisorTableSeeder extends Seeder {

	protected $advisor;
    protected $expertise;

	public function __construct(Advisor $advisor, Expertise $expertise)
	{
		$this->advisor   = $advisor;
        $this->expertise = $expertise;
	}

    public function run()
    {
        DB::table('advisors')->delete();

        $advisors = [
            0 => [
                'first'     => 'Chris',
                'last'      => 'Dima',
                'email'     => 'chris@walnutstlabs.com',
                'password'  => 'christemp1234',
                'expertise' => ['MVP', 'Product Management', 'Startups']
            ],
            1 => [
                'first'     => 'Kevin',
                'last'      => 'Fleming',
                'email'     => 'kevin@walnutstlabs.com',
                'password'  => 'kevintemp1234',
                'expertise' => ['Product Development', 'Product Management', 'Raising Capital']
            ],
            2 => [
                'first'     => 'Mary',
                'last'      => 'Fuchs',
                'email'     => 'mfuchs@cceconomicdevelopment.com ',
                'password'  => 'marytemp1234',
                'expertise' => ['Board Management', 'Grant Management', 'Tax Credits']
            ],
            3 => [
                'first'     => 'Dave',
                'last'      => 'Mann',
                'email'     => 'Dave@mannsoftware.com',
                'password'  => 'davetemp1234',
                'expertise' => ['ASP.NET', 'Amazon Web Services', 'Sharepoint']
            ],
            4 => [
                'first'     => 'Terry',
                'last'      => 'Kerwin',
                'email'     => 'tkerwin@foxrothschild.com',
                'password'  => 'terrytemp1234',
                'expertise' => ['Equity Compensation', 'IP Assignment & Protection', 'Raising Capital']
            ],
            5 => [
                'first'     => 'Raymond',
                'last'      => 'Sarnacki',
                'email'     => 'rpsarnacki@gmail.com',
                'password'  => 'raytemp1234',
                'expertise' => ['Business Modeling', 'Project Management', 'Pitching to Investors']
            ],
            6 => [
                'first'     => 'Craig',
                'last'      => 'Schroeder',
                'email'     => 'craig@sunriseinnovation.com',
                'password'  => 'craigtemp1234',
                'expertise' => ['Angel Investments', 'Consumer Finance', 'Residential Real Estate']
            ],
            7 => [
                'first'     => 'Eamon',
                'last'      => 'Gallagher',
                'email'     => 'eg@weberlawyers.com',
                'password'  => 'eamontemp1234',
                'expertise' => ['SEC Compliance', 'Corporate Law', 'Securities Law']
            ],
            8 => [
                'first'     => 'Mark',
                'last'      => 'Rybarczyk',
                'email'     => 'mark@vuier.com',
                'password'  => 'marktemp1234',
                'expertise' => ['Financial', 'Online Video', 'Startups']
            ],
            9 => [
                'first'     => 'Stacy',
                'last'      => 'Martin',
                'email'     => 'stacy.martin@hankingroup.com',
                'password'  => 'stacytemp1234',
                'expertise' => ['Lease and Proposal Negotations', 'Commercial Real Estate', 'Analysis of Lease vs Buy']
            ],
            10 => [
                'first'     => 'Paul',
                'last'      => 'Prestia',
                'email'     => 'pfpvfpa@gmail.com',
                'password'  => 'paultemp1234',
                'expertise' => ['Copyrights', 'Trademarks', 'Patents']
            ],
            11 => [
                'first'     => 'Denise',
                'last'      => 'Smart',
                'email'     => 'dsmart@smartconsultinggroup.com',
                'password'  => 'denisetemp1234',
                'expertise' => ['FDA Regulation of Life Science Products', 'Women Owned Business', 'FDA Regulation of Manufacturing and Development']
            ],
            12 => [
                'first'     => 'Wilson',
                'last'      => 'Chu',
                'email'     => 'wchu@comcast.net',
                'password'  => 'wilsontemp1234',
                'expertise' => ['Air Emissions & Environmental', 'Emissions Control Catalysts', 'Government R&D Funding & Liason']
            ],
            13 => [
                'first'     => 'Lars',
                'last'      => 'Knutsen',
                'email'     => 'l.knutsen@requispharma.com',
                'password'  => 'larstemp1234',
                'expertise' => ['Biotechnology', 'Pharmaceuticals', 'Commercializing Science']
            ],
            14 => [
                'first'     => 'Jim',
                'last'      => 'Lauckner',
                'email'     => 'jlauckner@cceconomicdevelopment.com',
                'password'  => 'jimtemp1234',
                'expertise' => ['Project Management', 'Recruiting', 'Industry Partnerships']
            ],
            15 => [
                'first'     => 'Leo',
                'last'      => 'Daiuto',
                'email'     => 'leo@leodaiuto.com',
                'password'  => 'leotemp1234',
                'expertise' => ['Product Development', 'User Experience', 'Consulting']
            ]
        ];

        foreach ($advisors as $advisor) {
            $advisorObject = $this->advisor->createAdvisor(
                $advisor['first'],
                $advisor['last'],
                $advisor['email'],
                $advisor['password']
            );

            foreach ($advisor['expertise'] as $expertiseName) {
                $this->expertise->connectExpertiseToAdvisor($expertiseName, $advisorObject->id);
            }

        }

        $this->advisor->createAdvisor(
            'Barry',
            'White',
            'hvent90@gmail.com',
            'password',
            100
        );
    }

}