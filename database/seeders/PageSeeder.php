<?php

namespace Database\Seeders;

use App\Models\Page;
use Illuminate\Database\Seeder;

class PageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $pages = [
            [
                'title' => 'About Us',
                'content' => 'Welcome to our company! We are a leading technology organization dedicated to providing innovative solutions and exceptional services to our clients worldwide. Our team of experienced professionals brings together diverse expertise in software development, digital transformation, and cutting-edge technologies. Since our founding, we have been committed to delivering high-quality products that exceed expectations and drive business growth. Our mission is to empower businesses through technology, helping them achieve their goals and stay competitive in the digital age. We believe in fostering long-term partnerships with our clients, built on trust, reliability, and mutual success.',
            ],
            [
                'title' => 'Contact Information',
                'content' => 'Get in touch with us! We would love to hear from you and discuss how we can help your business succeed. Our office is located in the heart of the technology district, easily accessible by public transportation. You can reach us by phone during business hours, Monday through Friday, 9 AM to 6 PM. Our email support team responds to inquiries within 24 hours. For urgent matters, please call our emergency hotline. We also offer online chat support through our website for immediate assistance. Schedule a consultation with our experts to explore custom solutions for your specific needs. We welcome partnerships, collaboration opportunities, and feedback from our valued community.',
            ],
            [
                'title' => 'Privacy Policy',
                'content' => 'Your privacy is extremely important to us. This privacy policy explains how we collect, use, and protect your personal information when you use our services and visit our website. We are committed to maintaining the confidentiality and security of your data in accordance with applicable privacy laws and regulations. We collect information that you voluntarily provide to us, such as when you create an account, contact us, or use our services. This may include your name, email address, phone number, and other relevant details. We use this information to provide and improve our services, communicate with you, and ensure a personalized experience. We do not sell, rent, or share your personal information with third parties without your explicit consent, except as required by law. We implement appropriate security measures to protect your data from unauthorized access, alteration, or disclosure.',
            ],
            [
                'title' => 'Terms of Service',
                'content' => 'These terms of service govern your use of our website and services. By accessing or using our services, you agree to be bound by these terms and conditions. Please read them carefully before proceeding. Our services are provided on an "as is" basis, and we make no warranties or guarantees regarding their availability, functionality, or performance. You are responsible for maintaining the confidentiality of your account credentials and for all activities that occur under your account. You agree to use our services only for lawful purposes and in accordance with these terms. Prohibited activities include but are not limited to: violating any applicable laws, infringing on intellectual property rights, transmitting harmful or malicious content, and interfering with the proper functioning of our services. We reserve the right to modify these terms at any time, and continued use of our services constitutes acceptance of the updated terms.',
            ],
            [
                'title' => 'Services Overview',
                'content' => 'We offer a comprehensive range of technology services designed to meet the diverse needs of modern businesses. Our software development services include custom application development, web development, mobile app development, and enterprise software solutions. We specialize in various programming languages and frameworks, ensuring that we can handle projects of any complexity and scale. Our digital transformation consulting helps organizations modernize their operations and embrace new technologies. We provide cloud migration services, helping businesses transition to cloud platforms for improved scalability and cost-effectiveness. Our team also offers maintenance and support services to ensure that your systems continue to operate smoothly and efficiently. Additionally, we provide training and knowledge transfer to help your team master new technologies and best practices.',
            ],
            [
                'title' => 'Career Opportunities',
                'content' => 'Join our dynamic team of talented professionals! We are always looking for passionate individuals who share our commitment to excellence and innovation. We offer exciting career opportunities in various fields including software development, project management, quality assurance, user experience design, and business analysis. Our company culture emphasizes collaboration, continuous learning, and professional growth. We provide competitive compensation packages, comprehensive benefits, flexible work arrangements, and opportunities for advancement. We invest in our employees through training programs, conferences, certifications, and mentorship initiatives. Whether you are a recent graduate or an experienced professional, we welcome applications from candidates who are eager to make a meaningful impact. We believe in diversity and inclusion, and we encourage applications from individuals of all backgrounds and experiences.',
            ],
            [
                'title' => 'Technology Stack',
                'content' => 'Our technology expertise spans a wide range of modern programming languages, frameworks, and tools. We work with popular backend technologies including Laravel, Node.js, Python Django, and .NET Core for building robust server-side applications. For frontend development, we utilize React, Vue.js, Angular, and vanilla JavaScript to create engaging user interfaces. Our mobile development capabilities include native iOS and Android development as well as cross-platform solutions using React Native and Flutter. We have extensive experience with various databases including MySQL, PostgreSQL, MongoDB, and Redis. Our cloud expertise covers Amazon Web Services, Google Cloud Platform, and Microsoft Azure. We also work with containerization technologies like Docker and Kubernetes for scalable deployments. Our development workflow incorporates modern practices such as continuous integration, automated testing, and agile methodologies.',
            ],
            [
                'title' => 'Client Success Stories',
                'content' => 'We take pride in our clients\' success stories and the positive impact our solutions have made on their businesses. Over the years, we have helped numerous organizations transform their operations, improve efficiency, and achieve their strategic objectives. One of our notable projects involved developing a comprehensive e-commerce platform for a retail client, resulting in a 300% increase in online sales within the first year. Another success story includes implementing a customer relationship management system for a service-based company, leading to improved customer satisfaction and 40% increase in customer retention. We also helped a startup build their minimum viable product from concept to launch, securing initial funding and establishing market presence. Our enterprise clients have benefited from our digital transformation initiatives, modernizing legacy systems and adopting cloud-based solutions for improved scalability and cost savings.',
            ],
        ];

        foreach ($pages as $page) {
            Page::create($page);
        }
    }
}
