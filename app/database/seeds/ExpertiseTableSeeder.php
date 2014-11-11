<?php

use \MyApp\Expertise;

class ExpertiseTableSeeder extends Seeder {

	protected $expertise;

	public function __construct(Expertise $expertise)
	{
		$this->expertise = $expertise;
	}

    public function run()
    {
        DB::table('expertise')->delete();

        $expertiseNames = [
            'MVP',
            'Startups',
            'Product Management',
            'Board Management',
            'Grant Management',
            'Tax Credits',
            'ASP.NET',
            'Amazon Web Services',
            'Sharepoint',
            'Equity Compensation',
            'IP Assignment & Protection',
            'Raising Capital',
            'Business Modeling',
            'Pitching to Investors',
            'Angel Investments',
            'Consumer Finance',
            'Residential Real Estate',
            'SEC Compliance',
            'Corporate Law',
            'Securities Law',
            'Financial',
            'Online Video',
            'Lease and Proposal Negotations',
            'Commercial Real Estate',
            'Analysis of Lease vs Buy',
            'Copyrights',
            'Trademarks',
            'Patents',
            'FDA Regulation of Life Science Products',
            'Women Owned Business',
            'FDA Regulation of Manufacturing and Development',
            'Air Emissions & Environmental',
            'Emissions Control Catalysts',
            'Government R&D Funding & Liason',
            'Biotechnology',
            'Pharmaceuticals',
            'Commercializing Science',
            'Project Management',
            'Recruiting',
            'Industry Partnerships',
            'Product Development',
            'User Experience',
            'Consulting'
        ];

        $government      = [
            'Government' => ['Tax Credits', 'SEC Compliance', 'Corporate Law', 'Securities Law', 'Lease and Proposal Negotations', 'FDA Regulation of Life Science Products', 'FDA Regulation of Manufacturing and Development', 'Government R&D Funding & Liason']
        ];
        $law             = [
            'Law' => ['Tax Credits', 'IP Assignment & Protection', 'SEC Compliance', 'Lease and Proposal Negotations', 'Copyrights', 'Trademarks', 'Patents', 'FDA Regulation of Life Science Products', 'FDA Regulation of Manufacturing and Development']
        ];
        $realEstate      = [
            'Real Estate' => ['Residential Real Estate', 'Commercial Real Estate', 'Analysis of Lease vs Buy', 'Lease and Proposal Negotations']
        ];
        $techDevelopment = [
            'Technical Development' => ['Product Development', 'User Experience', 'MVP', 'ASP.NET', 'Amazon Web Services', 'Sharepoint', 'Online Video']
        ];
        $management      = [
            'Management' => ['Industry Partnerships', 'Recruiting', 'Project Management', 'Commercializing Science', 'MVP', 'Product Management', 'Board Management', 'Grant Management', 'Equity Compensation', 'Raising Capital', 'Business Modeling', 'Women Owned Business']
        ];
        $financial       = [
            'Financial' => ['Industry Partnerships', 'Tax Credits', 'Equity Compensation', 'Pitching to Investors', 'Angel Investments', 'Consumer Finance', 'SEC Compliance', 'Financial', 'Government R&D Funding & Liason']
        ];
        $startups        = [
            'Startups' => ['Industry Partnerships', 'Recruiting', 'Commercializing Science', 'MVP', 'Startups', 'Product Management', 'Amazon Web Services', 'Equity Compensation', 'Raising Capital', 'Business Modeling', 'Pitching to Investors', 'Angel Investments']
        ];
        $marketing       = [
            'Marketing' => ['Product Management']
        ];
        $health          = [
            'Health' => ['Pharmaceuticals', 'Biotechnology', 'FDA Regulation of Life Science Products', 'Air Emissions & Environmental', 'Emissions Control Catalysts']
        ];

        $expertiseGroups = [$government, $law, $realEstate, $techDevelopment, $management, $financial, $startups, $marketing, $health];

        foreach ($expertiseNames as $name) {
            $this->expertise->createExpertise(
                $name,
                'Description goes here.'
            );
        }

        foreach ($expertiseGroups as $group) {
            foreach ($group as $groupName => $expertiseNames ) {
                foreach ($expertiseNames as $expertiseName) {
                    $this->expertise->connectExpertiseToExpertiseGroup($expertiseName, $groupName);
                }
            }
        }
    }

}