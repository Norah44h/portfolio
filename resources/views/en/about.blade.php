@extends('layouts.app')

@section('content')
    <section class="about-page-section">
        
        <div class="about-hero">
            <h1 class="about-title">Computer Science Graduate | Software Engineer</h1>
            <p class="about-philosophy">
                Computer Science goes far beyond a mere academic degree; it is a comprehensive toolset for analyzing complex problems and engineering refined digital solutions.
            </p>
        </div>

        <div class="journey-card-wrapper">
            <h2 class="section-heading">Journey & Background</h2>
            
            <div class="journey-grid-container">
                <!-- Card 1: Internship -->
                <div class="journey-card-item">
                    <div class="journey-item-content">
                        <span class="journey-date">June 2026 – August 2026</span>
                        <h3 class="journey-item-title">Software Engineering Trainee</h3>
                        <p class="journey-institution">Devoracy</p>
                        <p class="journey-desc">
                            Completed an intensive co-op training program at Devoracy, a specialized technology and software solutions company focused on building modern digital solutions, advanced systems, and web applications according to cutting-edge technologies and high industry standards.
                        </p>
                    </div>
                </div>

                <!-- Card 2: Education -->
                <div class="journey-card-item">
                    <div class="journey-item-content">
                        <span class="journey-date">2020 – 2026</span>
                        <h3 class="journey-item-title">Bachelor's Degree in Computer Science</h3>
                        <p class="journey-institution">Qassim University</p>
                        <p class="journey-desc">
                            Covered a comprehensive range of academic concepts including system architecture, algorithms, data structures, network principles, and information security, alongside solid foundations in Full-Stack web development, Artificial Intelligence, and Machine Learning.
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Capabilities Section -->
        <div class="capabilities-section">
            <h2 class="section-heading">Core Capabilities & Technical Mindset</h2>
            <div class="capabilities-box">
                <p>
                    I possess a flexible technical mindset that grants me high adaptability to quickly learn and work across various programming domains. I consistently rely on a clear methodology to dissect technical complexities and engineer stable, efficient systems that seamlessly align with business objectives and enhance user experience.
                </p>
                <p>
                    I am capable of engineering software from its foundational architecture—managing frameworks and database schemas in the backend, while developing fully-fledged frontend user interfaces and applying professional design standards, alongside integrating smart AI applications.
                </p>
            </div>
        </div>

        <div class="projects-cta-section">
            <a href="{{ route('en.projects') }}" class="projects-cta-btn">
                <span>Explore My Projects</span>
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>
            </a>
        </div>

    </section>
@endsection