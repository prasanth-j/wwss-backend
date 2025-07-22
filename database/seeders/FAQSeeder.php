<?php

namespace Database\Seeders;

use App\Models\FAQ;
use Illuminate\Database\Seeder;

class FAQSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faqs = [
            [
                'question' => 'What programming languages do you specialize in?',
                'answer' => 'We specialize in a wide range of programming languages including PHP, JavaScript, Python, Java, C#, Swift, and Kotlin. Our expertise covers both backend and frontend technologies, allowing us to build comprehensive full-stack applications. We stay current with the latest language features and best practices to ensure we deliver modern, efficient solutions.',
            ],
            [
                'question' => 'How long does a typical development project take?',
                'answer' => 'Project timelines vary significantly depending on complexity, scope, and requirements. Simple applications may take 2-4 weeks, while complex enterprise solutions can take 3-6 months or longer. We provide detailed project estimates during our initial consultation phase, breaking down timelines by development phases and milestones. We always strive to deliver projects on time while maintaining the highest quality standards.',
            ],
            [
                'question' => 'Do you provide ongoing support and maintenance?',
                'answer' => 'Yes, we offer comprehensive support and maintenance services for all our projects. This includes bug fixes, security updates, performance optimization, feature enhancements, and technical support. We provide different support packages to meet various needs and budgets, from basic maintenance to full-service support with guaranteed response times and priority assistance.',
            ],
            [
                'question' => 'Can you work with our existing development team?',
                'answer' => 'Absolutely! We frequently collaborate with existing development teams, whether as an extension of your team or as consultants providing specialized expertise. We can integrate seamlessly with your development processes, coding standards, and project management tools. Our team is experienced in remote collaboration and can adapt to your preferred communication and workflow methods.',
            ],
            [
                'question' => 'What is your development process and methodology?',
                'answer' => 'We follow agile development methodologies with iterative sprints, regular client communication, and continuous feedback integration. Our process includes requirements analysis, system design, development, testing, deployment, and ongoing support. We use modern development practices including version control, automated testing, continuous integration, and code reviews to ensure high-quality deliverables.',
            ],
            [
                'question' => 'How do you ensure the security of applications?',
                'answer' => 'Security is a top priority in all our development projects. We implement industry-standard security practices including secure coding standards, data encryption, authentication mechanisms, and regular security audits. We follow OWASP guidelines, conduct vulnerability assessments, and implement appropriate security measures based on the specific requirements and risk profile of each project.',
            ],
            [
                'question' => 'Do you offer cloud deployment and hosting services?',
                'answer' => 'Yes, we provide complete cloud deployment and hosting solutions using major cloud platforms like AWS, Google Cloud, and Azure. Our services include cloud architecture design, deployment automation, monitoring, scaling, and optimization. We help clients choose the most suitable cloud platform based on their technical requirements, budget, and scalability needs.',
            ],
            [
                'question' => 'What technologies do you use for mobile app development?',
                'answer' => 'We develop mobile applications using both native and cross-platform approaches. For native development, we use Swift for iOS and Kotlin/Java for Android. For cross-platform solutions, we specialize in React Native and Flutter. We help clients choose the best approach based on their target audience, performance requirements, budget, and timeline considerations.',
            ],
            [
                'question' => 'How do you handle project communication and updates?',
                'answer' => 'We maintain transparent and regular communication throughout the project lifecycle. We provide weekly progress reports, conduct regular video meetings, and use project management tools for real-time updates. Clients have access to development environments for testing and feedback. We adapt our communication frequency and methods to meet client preferences and project requirements.',
            ],
            [
                'question' => 'What happens if we need changes during development?',
                'answer' => 'We understand that requirements may evolve during development, and we build flexibility into our process to accommodate changes. We use an agile approach that allows for iterative feedback and adjustments. For significant scope changes, we provide impact assessments including timeline and budget implications, ensuring full transparency before implementing any modifications.',
            ],
            [
                'question' => 'Do you provide training for our team on new systems?',
                'answer' => 'Yes, we offer comprehensive training and knowledge transfer services as part of our project delivery. This includes user training, administrator training, developer training, and documentation creation. We can conduct training sessions remotely or on-site, and we provide ongoing support during the initial adoption period to ensure successful system implementation.',
            ],
            [
                'question' => 'How do you ensure code quality and testing?',
                'answer' => 'We maintain high code quality through multiple approaches including code reviews, automated testing, static code analysis, and adherence to coding standards. Our testing strategy encompasses unit testing, integration testing, and end-to-end testing. We use continuous integration pipelines to automatically run tests and quality checks on every code change, ensuring consistent quality throughout development.',
            ],
            [
                'question' => 'What is your approach to database design and optimization?',
                'answer' => 'Our database design follows normalization principles while considering performance requirements. We design efficient database schemas, implement proper indexing strategies, and optimize queries for performance. We have experience with various database systems including relational databases like MySQL and PostgreSQL, as well as NoSQL solutions like MongoDB and Redis for specific use cases.',
            ],
            [
                'question' => 'Can you help migrate from legacy systems?',
                'answer' => 'Yes, we specialize in legacy system modernization and migration projects. We assess existing systems, plan migration strategies, and execute phased migrations to minimize business disruption. Our approach includes data migration, functionality preservation, modern technology adoption, and comprehensive testing to ensure seamless transitions from legacy to modern systems.',
            ],
            [
                'question' => 'What industries do you have experience with?',
                'answer' => 'We have worked with clients across various industries including e-commerce, healthcare, finance, education, manufacturing, and professional services. Our diverse industry experience allows us to understand specific business requirements, regulatory compliance needs, and industry best practices. We leverage this knowledge to deliver solutions that are tailored to each industry\'s unique challenges and opportunities.',
            ],
        ];

        foreach ($faqs as $faq) {
            FAQ::create($faq);
        }
    }
}
