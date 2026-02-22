
<style>
    /* Customers Slider Section */
    .customers-section {
        padding: 40px 0;
        background: linear-gradient(135deg, #d7d7d7 0%, #4b4b33 50%, #5e5e50 100%);
        overflow: hidden;
        position: relative;
        width: 100%;
    }
    
    .customers-container {
        width: 100%;
        position: relative;
    }
    
    .section-header {
        text-align: center;
        margin-bottom: 40px;
        padding: 0 20px;
    }
    
    .section-header h2 {
        font-size: 3.5rem;
        color: #ffffff;
        margin-bottom: 1rem;
        font-weight: 900;
        font-family: 'Arial Black', Arial, sans-serif;
        letter-spacing: 2px;
        text-shadow: 0 4px 8px rgba(0, 0, 0, 0.3);
    }
    
    .section-header p {
        font-size: 1.8rem;
        color: #ffffff;
        font-weight: 600;
        text-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);
        margin: 0;
    }
    
    .customers-slider {
        position: relative;
        overflow: hidden;
        width: 100%;
        padding: 20px 0;
    }
    
    .slider-wrapper {
        display: flex;
        animation: slideAnimation 25s linear infinite;
        width: fit-content;
    }
    
    .slider-wrapper:hover {
        animation-play-state: paused;
    }
    
    .customer-slide {
        min-width: 120px;
        width: 120px;
        height: 120px;
        margin: 0 20px;
        border-radius: 50%;
        overflow: hidden;
        background: rgba(255, 255, 255, 0.1);
        box-shadow: 0 5px 20px rgba(0, 0, 0, 0.3);
        transition: all 0.3s ease;
        border: 3px solid transparent;
        background: linear-gradient(rgba(255, 255, 255, 0.1), rgba(255, 255, 255, 0.1)) padding-box,
                    linear-gradient(135deg, #505038 0%, #4b4b33 50%, #24240e 100%) border-box;
    }
    
    .customer-slide img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: all 0.3s ease;
    }
    
    .customer-slide:hover {
        transform: scale(1.1);
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.4);
        border: 3px solid transparent;
        background: linear-gradient(rgba(255, 255, 255, 0.2), rgba(255, 255, 255, 0.2)) padding-box,
                    linear-gradient(135deg, #505038 0%, #4b4b33 50%, #24240e 100%) border-box;
    }
    
    .customer-slide:hover img {
        transform: scale(1.05);
        filter: brightness(1.2);
    }
    
    @keyframes slideAnimation {
        0% {
            transform: translateX(0);
        }
        100% {
            transform: translateX(-50%);
        }
    }
    
    @media (max-width: 768px) {
        .section-header h2 {
            font-size: 2rem;
        }
        
        .customer-slide {
            min-width: 80px;
            width: 80px;
            height: 80px;
            margin: 0 15px;
        }
        
        .customers-section {
            padding: 30px 0;
        }
    }
</style>

<!-- Customers Section -->
<section class="customers-section" id="customers">
    <div class="customers-container">
        <div class="section-header">
            <h2>{{ __('messages.customers_title') }}</h2>
            <p>{{ __('messages.customers_subtitle') }}</p>
        </div>
        
        <div class="customers-slider">
            <div class="slider-wrapper">
                <!-- First set of logos -->
                <div class="customer-slide">
                    <img src="https://picsum.photos/seed/customer1/120/120.jpg" alt="شركة النخبة">
                </div>
                
                <div class="customer-slide">
                    <img src="https://picsum.photos/seed/customer2/120/120.jpg" alt="مجموعة المملكة">
                </div>
                
                <div class="customer-slide">
                    <img src="https://picsum.photos/seed/customer3/120/120.jpg" alt="دار الزمان">
                </div>
                
                <div class="customer-slide">
                    <img src="https://picsum.photos/seed/customer4/120/120.jpg" alt="فنون الشرق">
                </div>
                
                <div class="customer-slide">
                    <img src="https://picsum.photos/seed/customer5/120/120.jpg" alt="جمعية الأمل">
                </div>
                
                <div class="customer-slide">
                    <img src="https://picsum.photos/seed/customer6/120/120.jpg" alt="رؤية المستقبل">
                </div>
                
                <div class="customer-slide">
                    <img src="https://picsum.photos/seed/customer7/120/120.jpg" alt="شركة السعادة">
                </div>
                
                <div class="customer-slide">
                    <img src="https://picsum.photos/seed/customer8/120/120.jpg" alt="مؤسسة العطاء">
                </div>
                
                <!-- Duplicate logos for continuous animation -->
                <div class="customer-slide">
                    <img src="https://picsum.photos/seed/customer1/120/120.jpg" alt="شركة النخبة">
                </div>
                
                <div class="customer-slide">
                    <img src="https://picsum.photos/seed/customer2/120/120.jpg" alt="مجموعة المملكة">
                </div>
                
                <div class="customer-slide">
                    <img src="https://picsum.photos/seed/customer3/120/120.jpg" alt="دار الزمان">
                </div>
                
                <div class="customer-slide">
                    <img src="https://picsum.photos/seed/customer4/120/120.jpg" alt="فنون الشرق">
                </div>
                
                <div class="customer-slide">
                    <img src="https://picsum.photos/seed/customer5/120/120.jpg" alt="جمعية الأمل">
                </div>
                
                <div class="customer-slide">
                    <img src="https://picsum.photos/seed/customer6/120/120.jpg" alt="رؤية المستقبل">
                </div>
                
                <div class="customer-slide">
                    <img src="https://picsum.photos/seed/customer7/120/120.jpg" alt="شركة السعادة">
                </div>
                
                <div class="customer-slide">
                    <img src="https://picsum.photos/seed/customer8/120/120.jpg" alt="مؤسسة العطاء">
                </div>
            </div>
        </div>
    </div>
</section>
