const mongoose = require('mongoose');

const productSchema = new mongoose.Schema(
  {
    name: { type: String, required: true, trim: true },
    nameAr: { type: String, default: '' },
    description: { type: String, required: true },
    descriptionAr: { type: String, default: '' },
    price: { type: Number, required: true },
    category: {
      type: String,
      enum: ['coffee', 'ganoderma', 'supplements', 'skincare', 'beverages', 'personal-care', 'other'],
      required: true,
    },
    image: { type: String, default: '' },
    landingImage: { type: String, default: '' },
    images: [{ type: String }],
    inStock: { type: Boolean, default: true },
    stockCount: { type: Number, default: 0 },
    sku: { type: String, unique: true, sparse: true },
    benefits: [{ type: String }],
    benefitsAr: [{ type: String }],
    ingredients: { type: String },
    ingredientsAr: { type: String, default: '' },
    usage: { type: String },
    usageAr: { type: String, default: '' },
    featured: { type: Boolean, default: false },
    dxnId: { type: String, default: '' },
    sourceUrl: { type: String, default: '' },
    landingPage: { type: String, default: '' },
    dxnCategory: { type: String, default: '' },
    rating: { type: Number, default: 0 },
    reviews: [
      {
        user: { type: mongoose.Schema.Types.ObjectId, ref: 'User' },
        name: String,
        rating: Number,
        comment: String,
        createdAt: { type: Date, default: Date.now },
      },
    ],
  },
  { timestamps: true }
);

module.exports = mongoose.model('Product', productSchema);
